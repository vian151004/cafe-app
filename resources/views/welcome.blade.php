<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Cafe Landing') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-cream text-slate-900 antialiased">
        <nav id="main-nav" class="fixed top-0 z-50 w-full border-b border-white/10 bg-white/10 backdrop-blur-md transition-colors duration-300">
            <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-5 text-white">
                <a href="#home" class="text-xl font-semibold tracking-wide">CafeKita</a>
                <div class="hidden items-center gap-7 text-base font-medium md:flex">
                    <a href="#home" class="transition hover:text-cream">Beranda</a>
                    <a href="#about" class="transition hover:text-cream">Tentang kami</a>
                    <a href="#menu" class="transition hover:text-cream">Menu</a>
                    <a href="#reservation" class="transition hover:text-cream">Reservasi</a>
                    <a href="#contact" class="transition hover:text-cream">Kontak</a>
                </div>
                <a href="#reservation" class="hidden rounded-full bg-white/20 px-6 py-2.5 text-base font-semibold text-white transition hover:bg-white/30 md:inline-flex">Reservasi</a>
            </div>
        </nav>

        <main>
            <section id="home" class="relative flex min-h-screen items-center justify-center">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/home.png') }}" alt="Cafe interior" class="h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-linear-to-t from-primary/90 via-primary/40 to-transparent"></div>
                </div>
                <div class="relative z-10 mx-auto w-full max-w-6xl px-6 text-center text-white">
                    <h1 class="text-7xl font-bold leading-tight">Cafe Kita Coffee Experience</h1>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-white/80">
                        Temukan kenikmatan kopi di tengah keasrian alam dengan sajian khas yang selalu hangat dan berkesan.
                    </p>
                    <div class="mt-9 flex flex-wrap items-center justify-center gap-5">
                        <a href="#menu" class="rounded-full border border-white px-7 py-2.5 text-base font-semibold text-white transition hover:bg-white/10">Lihat Menu</a>
                        <a href="#reservation" class="rounded-full bg-white px-7 py-2.5 text-base font-semibold text-primary shadow-lg transition hover:-translate-y-0.5">Reservasi</a>
                    </div>
                </div>
            </section>

            <section id="about" class="relative flex min-h-screen items-center overflow-hidden bg-white">
                <div class="absolute right-0 top-0 z-0 h-40 w-40 translate-x-1/3 -translate-y-1/3 overflow-hidden rounded-full shadow-lg md:h-170 md:w-250">
                    <img
                        src="{{ asset('images/about-coffee.jpg') }}"
                        alt="Coffee background"
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="relative z-10 mx-auto w-full max-w-6xl px-16 md:px-24">
                    <div class="max-w-4xl -mt-32 md:-ml-48">
                        <div>
                            <h2 class="text-6xl font-bold text-primary ml-0 md:ml-0">Tentang Kami</h2>
                        </div>
                        <div>
                            <p class="mt-10 text-2xl text-slate-700 ml-0 md:ml-0">
                                "Di CafeKita, kami percaya bahwa secangkir kopi terbaik adalah yang dinikmati bersama cerita. Berawal dari kecintaan
                            kami terhadap biji kopi nusantara, kami menghadirkan ruang di mana setiap orang bisa merasa seperti di rumah sendiri. Setiap tindakan latte kami sajikan dalam bentuk dedikasi kami untuk menciptakan momen hangat bagi komunitas. Di sini,
                            kamu bukan sekadar pelanggan, kamu adalah bagian dari cerita kami."
                            </p>
                        </div>
                        <div>
                            <h3 class="mt-12 text-4xl font-semibold text-primary ml-0 md:ml-0">Misi Kami</h3>
                        <div>
                            <p class="mt-10 text-2xl text-white ml-0 md:ml-0 bg-primary/80 rounded-3xl px-6 py-4">
                                <img src="{{ asset('icons/Otentik.svg') }}" alt="Otentik" class="mr-3 inline-block h-8 w-8 align-middle" />
                                <b> Cita Rasa Nusantara yang Otentik:</b> Menyajikan biji kopi pilihan terbaik yang diracik dengan dedikasi penuh di setiap cangkirnya.
                            </p>
                        </div>
                        <div>
                            <p class="mt-10 text-2xl text-white ml-0 md:ml-0 bg-primary/80 rounded-3xl px-6 py-4">
                                <img src="{{ asset('icons/Group.svg') }}" alt="Group" class="mr-3 inline-block h-8 w-8 align-middle" />
                                <b>Ruang Nyaman Layaknya Rumah:</b> Menghadirkan suasana hangat yang membuat setiap orang merasa diterima, lebih dari sekadar pelanggan biasa.
                            </p>
                        </div>
                        <div>
                            <p class="mt-10 text-2xl text-white ml-0 md:ml-0 bg-primary/80 rounded-3xl px-6 py-4">
                                <img src="{{ asset('icons/Koneksi.svg') }}" alt="Koneksi" class="mr-3 inline-block h-8 w-8 align-middle" />
                                <b>Koneksi Melalui Cerita:</b> Menjadi wadah bagi komunitas untuk berbagi inspirasi, tawa, dan momen berharga sambil menikmati kopi berkualitas.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="menu" class="flex min-h-screen items-center bg-linear-to-b from-primary to-secondary py-24">
                <div class="mx-auto w-full max-w-6xl px-6 text-white">
                    <div class="text-center">
                        <p class="text-base font-semibold uppercase tracking-[0.25em] text-white">MENU</p>
                        <h2 class="mt-3 text-5xl font-serif font-semibold text-white">Signature</h2>
                    </div>
                    <div class="mt-16 grid grid-cols-1 gap-10 md:grid-cols-3">
                        <div class="relative mt-32 flex flex-col items-center rounded-[9999px] bg-linear-to-b from-primary to-transparent px-6 pb-24 pt-36 text-center backdrop-blur-sm">
                            <img
                                src="{{ asset('images/menu-nasi-goreng.png') }}"
                                alt="Nasi Goreng"
                                class="absolute -top-36 left-1/2 h-64 w-64 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)] md:h-72 md:w-72"
                            />
                            <h3 class="mt-5 text-3xl font-bold text-[#FFB800]">Nasi Goreng</h3>
                            <p class="mt-4 ml-8 mr-8 text-justify text-1xl text-white/80">
                                Mahakarya kuliner berbumbu rempah khas dengan aroma smoky autentik dan tekstur sempurna. Mahakarya kuliner berbumbu rempah khas dengan aroma smoky autentik dan tekstur sempurna. Mahakarya kuliner berbumbu rempah khas dengan aroma smoky autentik dan tekstur sempurna.
                            </p>
                        </div>
                        <div class="relative mt-48 flex flex-col items-center rounded-[9999px] bg-linear-to-b from-primary to-transparent px-6 pb-24 pt-36 text-center backdrop-blur-sm">
                            <img
                                src="{{ asset('images/menu-ayam-goreng.png') }}"
                                alt="Ayam Goreng"
                                class="absolute -top-36 left-1/2 h-64 w-64 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)] md:h-72 md:w-72"
                            />
                            <h3 class="mt-5 text-3xl font-bold text-[#FFB800]">Ayam Goreng</h3>
                            <p class="mt-4 ml-8 mr-8 text-justify text-1xl text-white/80">
                                Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium.
                            </p>
                        </div>
                        <div class="relative mt-64 flex flex-col items-center rounded-[9999px] bg-linear-to-b from-primary to-transparent px-6 pb-24 pt-36 text-center backdrop-blur-sm">
                            <img
                                src="{{ asset('images/menu-mie-goreng.png') }}"
                                alt="Mie Goreng"
                                class="absolute -top-36 left-1/2 h-64 w-64 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)] md:h-72 md:w-72"
                            />
                            <h3 class="mt-5 text-3xl font-bold text-[#FFB800]">Mie Goreng</h3>
                            <p class="mt-4 ml-8 mr-8 text-justify text-1xl text-white/80">
                                Kombinasi mie kenyal dan bumbu aromatik dengan sentuhan elegan untuk tiap suapan. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="reservation" class="relative flex min-h-screen items-center overflow-hidden bg-linear-to-b from-primary to-secondary">
                <img
                    src="{{ asset('images/menu-mie-goreng.png') }}"
                    alt="Mie Goreng"
                    class="absolute -left-32 top-1/2 h-125 w-125 -translate-y-1/2 rounded-full object-cover shadow-2xl md:-left-48 md:h-175 md:w-175"
                />
                <div class="relative z-10 mx-auto flex w-full max-w-6xl justify-end px-6">
                    <div class="w-full md:w-1/2 text-white">
                        <p class="text-base font-semibold uppercase tracking-[0.25em] text-[#FFB800]">RESERVASI?</p>
                        <h2 class="mt-4 text-4xl font-semibold">Nikmati layanan prioritas untuk pengalaman terbaik.</h2>
                        <p class="mt-4 text-base text-white/80">
                            Nikmati kenyamanan layanan prioritas tanpa perlu mengantri agar pengalaman kulinermu terasa lebih eksklusif dan maksimal.
                        </p>
                        <a href="#" class="mt-7 inline-flex rounded-full bg-[#FFB800] px-7 py-3.5 text-base font-semibold text-slate-900 shadow-lg transition hover:-translate-y-0.5">Reservasi</a>
                    </div>
                </div>
            </section>
        </main>

        <a
            href="https://wa.me/628123456789"
            class="fixed bottom-6 right-6 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-lg shadow-emerald-500/40 transition hover:-translate-y-1"
            aria-label="Chat on WhatsApp"
        >
            <svg viewBox="0 0 24 24" class="h-6 w-6" fill="currentColor" aria-hidden="true">
                <path d="M12 2a10 10 0 0 0-8.74 14.86L2 22l5.31-1.39A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.11-1.13l-.3-.18-3.15.82.84-3.06-.2-.32A8 8 0 1 1 12 20Zm4.38-5.45c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.95-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.38.1-.5.1-.1.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2 0 1.18.86 2.32.98 2.48.12.16 1.7 2.6 4.12 3.64.58.24 1.04.38 1.4.48.58.18 1.1.16 1.52.1.46-.06 1.43-.58 1.64-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z" />
            </svg>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script>
            gsap.from("nav", { y: -40, opacity: 0, duration: 0.8, ease: "power2.out" });
            gsap.from("#home h1", { y: 30, opacity: 0, duration: 0.9, delay: 0.2, ease: "power2.out" });
            gsap.from("#home p", { y: 20, opacity: 0, duration: 0.8, delay: 0.35, ease: "power2.out" });

            const nav = document.getElementById("main-nav");
            const aboutSection = document.getElementById("about");
            const menuSection = document.getElementById("menu");

            const updateNavColor = () => {
                if (!nav || !aboutSection || !menuSection) return;
                const navOffset = nav.offsetHeight + 8;
                const scrollPos = window.scrollY + navOffset;
                const aboutTop = aboutSection.offsetTop;
                const menuTop = menuSection.offsetTop;

                if (scrollPos >= aboutTop && scrollPos < menuTop) {
                    nav.classList.add("bg-black/20");
                    nav.classList.remove("bg-white/10");
                } else {
                    nav.classList.add("bg-white/10");
                    nav.classList.remove("bg-black/20");
                }
            };

            window.addEventListener("scroll", updateNavColor, { passive: true });
            window.addEventListener("resize", updateNavColor);
            updateNavColor();
        </script>
    </body>
</html>
