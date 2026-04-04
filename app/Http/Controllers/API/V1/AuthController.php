<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Gunakan Auth::attempt untuk memverifikasi password
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah.',
                ], 401);
            }

            $user = Auth::user();

            // Ambil role dari Spatie (sesuai settingan Filament kita sebelumnya)
            $role = $user->getRoleNames()->first() ?? 'user';

            // Opsional: Hapus token lama jika ingin single-device login
            // $user->tokens()->delete();

            // Buat token baru
            $token = $user->createToken('api-token', [$role])->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $role, // Mengambil dari Spatie
                    ],
                    'token' => $token,
                    // Pastikan method ini ada di Model User, atau ganti manual
                    'redirect_url' => $role === 'admin' ? '/admin' : '/kasir',
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server.',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
        } catch (\Throwable $e) {
        }


        try {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            // $request->session()->regenerateToken();
        } catch (\Throwable $e) {
        }

        return response()->json(['message' => 'Logged out']);
    }

    /**
     * Send password reset link
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email tidak ditemukan.',
                ], 400);
            }

            // Generate reset token
            $token = Str::random(64);

            // Save token to password_reset_tokens table
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                [
                    'token' => Hash::make($token),
                    'created_at' => now(),
                ]
            );

            // Send reset email
            $resetUrl = env('APP_URL') . '/reset-password?token=' . $token . '&email=' . urlencode($user->email);

            Mail::send('emails.reset-password', [
                'resetUrl' => $resetUrl,
                'email' => $user->email,
            ], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Reset Password - LIMS Laboo');
            });

            return response()->json([
                'success' => true,
                'message' => 'Password reset link telah dikirim ke email Anda. Silahkan cek email Anda.',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Reset password with token
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                    ])->setRememberToken(Str::random(60));
                    $user->save();
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password berhasil direset. Silahkan login dengan password baru Anda.',
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Token reset password tidak valid atau telah kadaluarsa.',
            ], 400);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}