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
            <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 sm:px-6 py-4 sm:py-5 text-white">
                <a href="#home" class="text-lg sm:text-xl font-semibold tracking-wide">CafeKita</a>
                <div class="hidden items-center gap-4 sm:gap-7 text-sm sm:text-base font-medium md:flex">
                    <a href="#home" class="transition hover:text-cream">Beranda</a>
                    <a href="#about" class="transition hover:text-cream">Tentang kami</a>
                    <a href="#menu" class="transition hover:text-cream">Menu</a>
                    <a href="#reservation" class="transition hover:text-cream">Reservasi</a>
                    <a href="#contact" class="transition hover:text-cream">Kontak</a>
                </div>
                <button id="mobile-menu-btn" class="md:hidden flex flex-col gap-1.5 w-6 h-6">
                    <span class="w-full h-0.5 bg-white transition"></span>
                    <span class="w-full h-0.5 bg-white transition"></span>
                    <span class="w-full h-0.5 bg-white transition"></span>
                </button>
                <a href="#reservation" class="hidden rounded-full bg-white/20 px-5 sm:px-6 py-2 sm:py-2.5 text-sm sm:text-base font-semibold text-white transition hover:bg-white/30 md:inline-flex">Reservasi</a>
            </div>
            <div id="mobile-menu" class="hidden md:hidden bg-white/10 backdrop-blur-md border-t border-white/10">
                <div class="px-4 py-4 flex flex-col gap-3">
                    <a href="#home" class="py-2 transition hover:text-cream">Beranda</a>
                    <a href="#about" class="py-2 transition hover:text-cream">Tentang kami</a>
                    <a href="#menu" class="py-2 transition hover:text-cream">Menu</a>
                    <a href="#reservation" class="py-2 transition hover:text-cream">Reservasi</a>
                    <a href="#contact" class="py-2 transition hover:text-cream">Kontak</a>
                    <a href="#reservation" class="mt-2 rounded-full bg-white/20 px-6 py-2.5 text-base font-semibold text-white transition hover:bg-white/30 inline-flex">Reservasi</a>
                </div>
            </div>
        </nav>

        <main class="relative">
            <section id="home" class="sticky top-0 z-10 flex min-h-screen items-center justify-center pt-16 sm:pt-20">
                <div class="absolute inset-0">
                    <img src="{{ asset('images/home.png') }}" alt="Cafe interior" class="h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-linear-to-t from-primary/90 via-primary/40 to-transparent"></div>
                </div>
                <div class="relative z-10 mx-auto w-full max-w-6xl px-4 sm:px-6 text-center text-white">
                    <h1 class="home-h1 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight opacity-0">Cafe Kita Coffee Experience</h1>
                    <p class="home-p mx-auto mt-4 sm:mt-5 max-w-2xl text-sm sm:text-base md:text-lg text-white/80 opacity-0">
                        Temukan kenikmatan kopi di tengah keasrian alam dengan sajian khas yang selalu hangat dan berkesan.
                    </p>
                    <div class="home-buttons mt-6 sm:mt-9 flex flex-col sm:flex-row flex-wrap items-center justify-center gap-3 sm:gap-5 opacity-0">
                        <a href="#menu" class="w-full sm:w-auto rounded-full border border-white px-6 sm:px-7 py-2 sm:py-2.5 text-sm sm:text-base font-semibold text-white transition hover:bg-white/10">Lihat Menu</a>
                        <a href="#reservation" class="w-full sm:w-auto rounded-full bg-white px-6 sm:px-7 py-2 sm:py-2.5 text-sm sm:text-base font-semibold text-primary shadow-lg transition hover:-translate-y-0.5">Reservasi</a>
                    </div>
                </div>
            </section>

            <section id="about" class="sticky top-0 z-20 flex min-h-screen items-center overflow-hidden bg-white py-12 sm:py-0 shadow-[0_-15px_40px_rgba(0,0,0,0.15)]">
                <div class="absolute right-0 top-0 z-0 h-full w-1/3 overflow-hidden hidden md:block">
                    <img
                        src="{{ asset('images/about-coffee.png') }}"
                        alt="Coffee background"
                        class="h-full w-full object-cover"
                    />
                </div>
                <div class="relative z-10 mx-auto w-full max-w-375 px-4 sm:px-6 md:px-8">
                    <div class="max-w-3xl md:ml-0">
                        <div class="about-title opacity-0">
                            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-primary">Tentang Kami</h2>
                        </div>
                        <div class="about-desc opacity-0">
                            <p class="mt-6 sm:mt-8 md:mt-8 text-sm sm:text-base md:text-lg lg:text-xl text-slate-700">
                                "Di CafeKita, kami percaya bahwa secangkir kopi terbaik adalah yang dinikmati bersama cerita. Berawal dari kecintaan
                            kami terhadap biji kopi nusantara, kami menghadirkan ruang di mana setiap orang bisa merasa seperti di rumah sendiri. Setiap tindakan latte kami sajikan dalam bentuk dedikasi kami untuk menciptakan momen hangat bagi komunitas. Di sini,
                            kamu bukan sekadar pelanggan, kamu adalah bagian dari cerita kami."
                            </p>
                        </div>
                        <div class="about-mission-title opacity-0">
                            <h3 class="mt-8 sm:mt-10 md:mt-10 text-2xl sm:text-3xl md:text-4xl font-semibold text-primary">Misi Kami</h3>
                        </div>
                        <div class="about-mission-item opacity-0">
                            <p class="mt-6 sm:mt-8 md:mt-10 text-sm sm:text-base md:text-lg lg:text-xl text-white bg-primary/80 rounded-2xl sm:rounded-3xl px-4 sm:px-6 py-3 sm:py-4">
                                <img src="{{ asset('icons/Otentik.svg') }}" alt="Otentik" class="mr-2 sm:mr-3 inline-block h-6 sm:h-8 w-6 sm:w-8 align-middle" />
                                <b> Cita Rasa Nusantara yang Otentik:</b> Menyajikan biji kopi pilihan terbaik yang diracik dengan dedikasi penuh di setiap cangkirnya.
                            </p>
                        </div>
                        <div class="about-mission-item opacity-0">
                            <p class="mt-4 sm:mt-6 md:mt-10 text-sm sm:text-base md:text-lg lg:text-xl text-white bg-primary/80 rounded-2xl sm:rounded-3xl px-4 sm:px-6 py-3 sm:py-4">
                                <img src="{{ asset('icons/Group.svg') }}" alt="Group" class="mr-2 sm:mr-3 inline-block h-6 sm:h-8 w-6 sm:w-8 align-middle" />
                                <b>Ruang Nyaman Layaknya Rumah:</b> Menghadirkan suasana hangat yang membuat setiap orang merasa diterima, lebih dari sekadar pelanggan biasa.
                            </p>
                        </div>
                        <div class="about-mission-item opacity-0">
                            <p class="mt-4 sm:mt-6 md:mt-10 text-sm sm:text-base md:text-lg lg:text-xl text-white bg-primary/80 rounded-2xl sm:rounded-3xl px-4 sm:px-6 py-3 sm:py-4">
                                <img src="{{ asset('icons/Koneksi.svg') }}" alt="Koneksi" class="mr-2 sm:mr-3 inline-block h-6 sm:h-8 w-6 sm:w-8 align-middle" />
                                <b>Koneksi Melalui Cerita:</b> Menjadi wadah bagi komunitas untuk berbagi inspirasi, tawa, dan momen berharga sambil menikmati kopi berkualitas.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="menu" class="sticky top-0 z-30 flex min-h-screen items-center bg-linear-to-b from-primary to-secondary py-12 sm:py-16 md:py-24 shadow-[0_-15px_40px_rgba(0,0,0,0.15)]">
                <div class="mx-auto w-full max-w-6xl px-4 sm:px-6 text-white">
                    <div class="menu-header opacity-0">
                        <p class="text-xs sm:text-sm font-semibold uppercase tracking-[0.25em] text-white">MENU</p>
                        <h2 class="mt-2 sm:mt-3 text-3xl sm:text-4xl md:text-5xl font-serif font-semibold text-white">Signature</h2>
                    </div>
                    <div class="mt-12 sm:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 md:gap-10 ">
                        <div class="menu-card opacity-0 relative mt-24 sm:mt-32 lg:mt-32 flex flex-col items-center rounded-t-3xl sm:rounded-t-[9999px] bg-linear-to-b from-primary to-transparent px-4 sm:px-6 pb-20 sm:pb-24 pt-28 sm:pt-36 text-center backdrop-blur-sm">
                            <img
                                src="{{ asset('images/menu-nasi-goreng.png') }}"
                                alt="Nasi Goreng"
                                class="absolute -top-28 sm:-top-42 left-1/2 h-48 w-48 sm:h-56 md:h-80 sm:w-56 md:w-80 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)]"
                            />
                            <h3 class="mt-4 sm:mt-5 text-2xl sm:text-3xl font-bold text-[#FFB800]">Nasi Goreng</h3>
                            <p class="mt-3 sm:mt-4 px-3 sm:px-4 text-justify text-xs sm:text-sm md:text-base text-white/80">
                                Mahakarya kuliner berbumbu rempah khas dengan aroma smoky autentik dan tekstur sempurna. Mahakarya kuliner berbumbu rempah khas dengan aroma smoky autentik dan tekstur sempurna.
                            </p>
                        </div>
                        <div class="menu-card opacity-0 relative mt-32 sm:mt-48 lg:mt-32 flex flex-col items-center rounded-t-3xl sm:rounded-t-[9999px] bg-linear-to-b from-primary to-transparent px-4 sm:px-6 pb-20 sm:pb-24 pt-28 sm:pt-36 text-center backdrop-blur-sm">
                            <img
                                src="{{ asset('images/menu-ayam-goreng.png') }}"
                                alt="Ayam Goreng"
                                class="absolute -top-28 sm:-top-42 left-1/2 h-48 w-48 sm:h-56 md:h-80 sm:w-56 md:w-80 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)]"
                            />
                            <h3 class="mt-4 sm:mt-5 text-2xl sm:text-3xl font-bold text-[#FFB800]">Ayam Goreng</h3>
                            <p class="mt-3 sm:mt-4 px-3 sm:px-4 text-justify text-xs sm:text-sm md:text-base text-white/80">
                                Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium.
                            </p>
                        </div>
                        <div class="menu-card opacity-0 relative mt-32 sm:mt-48 lg:mt-32 flex flex-col items-center rounded-t-3xl sm:rounded-t-[9999px] bg-linear-to-b from-primary to-transparent px-4 sm:px-6 pb-20 sm:pb-24 pt-28 sm:pt-36 text-center backdrop-blur-sm sm:col-span-2 lg:col-span-1">
                            <img
                                src="{{ asset('images/menu-mie-goreng.png') }}"
                                alt="Mie Goreng"
                                class="absolute -top-28 sm:-top-42 left-1/2 h-48 w-48 sm:h-56 md:h-80 sm:w-56 md:w-80 -translate-x-1/2 rounded-full border-4 border-transparent object-cover shadow-[0_20px_30px_-10px_rgba(0,0,0,0.5)]"
                            />
                            <h3 class="mt-4 sm:mt-5 text-2xl sm:text-3xl font-bold text-[#FFB800]">Mie Goreng</h3>
                            <p class="mt-3 sm:mt-4 px-3 sm:px-4 text-justify text-xs sm:text-sm md:text-base text-white/80">
                                Kombinasi mie kenyal dan bumbu aromatik dengan sentuhan elegan untuk tiap suapan. Memadukan kulit super renyah dan daging lembut kaya rempah untuk cita rasa premium.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="reservation" class="sticky top-0 z-40 flex min-h-screen items-center overflow-hidden bg-linear-to-b from-primary to-secondary py-12 sm:py-0 shadow-[0_-15px_40px_rgba(0,0,0,0.15)]">
                <img
                    src="{{ asset('images/menu-mie-goreng.png') }}"
                    alt="Mie Goreng"
                    class="reservation-image absolute -left-16 sm:-left-32 lg:-left-100 top-1/2 h-80 sm:h-96 md:h-120 lg:h-300 w-80 sm:w-96 md:w-120 lg:w-300 -translate-y-1/2 rounded-full object-cover shadow-2xl hidden sm:block opacity-0"
                />
                <div class="relative z-10 mx-auto flex w-full max-w-6xl justify-center sm:justify-end px-4 sm:px-6">
                    <div class="reservation-content w-full sm:w-full md:w-1/2 text-white opacity-0">
                        <p class="text-xs sm:text-sm font-semibold uppercase tracking-[0.25em] text-[#FFB800]">RESERVASI?</p>
                        <h2 class="mt-3 sm:mt-4 text-2xl sm:text-3xl md:text-4xl font-semibold">Nikmati layanan prioritas untuk pengalaman terbaik.</h2>
                        <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-white/80">
                            Nikmati kenyamanan layanan prioritas tanpa perlu mengantri agar pengalaman kulinermu terasa lebih eksklusif dan maksimal.
                        </p>
                        <a href="#" class="mt-5 sm:mt-7 inline-flex rounded-full bg-[#FFB800] px-6 sm:px-7 py-2.5 sm:py-3.5 text-sm sm:text-base font-semibold text-slate-900 shadow-lg transition hover:-translate-y-0.5">Reservasi</a>
                    </div>
                </div>
            </section>
        </main>

        <a
            href="https://wa.me/628123456789"
            class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 flex h-12 sm:h-14 w-12 sm:w-14 items-center justify-center rounded-full bg-emerald-500 text-white shadow-lg shadow-emerald-500/40 transition hover:-translate-y-1 z-50"
            aria-label="Chat on WhatsApp"
        >
            <svg viewBox="0 0 24 24" class="h-5 sm:h-6 w-5 sm:w-6" fill="currentColor" aria-hidden="true">
                <path d="M12 2a10 10 0 0 0-8.74 14.86L2 22l5.31-1.39A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.11-1.13l-.3-.18-3.15.82.84-3.06-.2-.32A8 8 0 1 1 12 20Zm4.38-5.45c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.95-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.38.1-.5.1-.1.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2 0 1.18.86 2.32.98 2.48.12.16 1.7 2.6 4.12 3.64.58.24 1.04.38 1.4.48.58.18 1.1.16 1.52.1.46-.06 1.43-.58 1.64-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z" />
            </svg>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
        <script>
            gsap.registerPlugin(ScrollTrigger);

            // ===== SECTION 1 (HOME) - Fade in dari bawah =====
            gsap.to(".home-h1", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.2
            });

            gsap.to(".home-p", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.4
            });

            gsap.to(".home-buttons", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.6
            });

            // ===== SECTION 2 (ABOUT) - Dari kiri ke kanan dengan stagger =====
            gsap.to(".about-title", {
                scrollTrigger: {
                    trigger: "#about",
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out"
            });

            gsap.to(".about-desc", {
                scrollTrigger: {
                    trigger: "#about",
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.2
            });

            gsap.to(".about-mission-title", {
                scrollTrigger: {
                    trigger: "#about",
                    start: "top 50%",
                    toggleActions: "play none none none"
                },
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.4
            });

            // Animate mission items 1 by 1
            gsap.utils.toArray(".about-mission-item").forEach((item, index) => {
                gsap.to(item, {
                    scrollTrigger: {
                        trigger: "#about",
                        start: "top 50%",
                        toggleActions: "play none none none"
                    },
                    x: 0,
                    opacity: 1,
                    duration: 0.6,
                    ease: "power2.out",
                    delay: 0.6 + (index * 0.15)
                });
            });

            // ===== SECTION 3 (MENU) - Dari bawah ke atas =====
            gsap.to(".menu-header", {
                scrollTrigger: {
                    trigger: "#menu",
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out"
            });

            // Menu cards muncul 1 by 1 dari bawah
            gsap.utils.toArray(".menu-card").forEach((card, index) => {
                gsap.to(card, {
                    scrollTrigger: {
                        trigger: "#menu",
                        start: "top 60%",
                        toggleActions: "play none none none"
                    },
                    y: 0,
                    opacity: 1,
                    duration: 0.6,
                    ease: "power2.out",
                    delay: 0.2 + (index * 0.15)
                });
            });

            // ===== SECTION 4 (RESERVATION) - Dari kiri ke kanan =====
            gsap.to(".reservation-image", {
                scrollTrigger: {
                    trigger: "#reservation",
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                x: 0,
                opacity: 1,
                duration: 1,
                ease: "power2.out"
            });

            gsap.to(".reservation-content", {
                scrollTrigger: {
                    trigger: "#reservation",
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                x: 0,
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.2
            });

            // ===== NAV MOBILE MENU =====
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById("mobile-menu-btn");
            const mobileMenu = document.getElementById("mobile-menu");
            
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener("click", () => {
                    mobileMenu.classList.toggle("hidden");
                });
                
                // Close menu when clicking on a link
                const mobileMenuLinks = mobileMenu.querySelectorAll("a");
                mobileMenuLinks.forEach(link => {
                    link.addEventListener("click", () => {
                        mobileMenu.classList.add("hidden");
                    });
                });
            }

            // ===== NAV COLOR CHANGE ON SCROLL =====
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