<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings->seo_title ?? 'BET CAPITAL SAC - Logística Pesada')</title>
    <meta name="description" content="@yield('meta_description', $settings->seo_description ?? '')">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=block" rel="stylesheet">

    <!-- Favicon -->
    <link class="w-4 h-4 object-contain" rel="icon" type="image/webp" href="{{ !empty($settings->site_favicon) ? asset('storage/' . $settings->site_favicon) : asset('img/ICON ORIGINAL.webp') }}">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-surface font-sans antialiased overflow-x-hidden">

    <!-- TopNavBar -->
    <header class="bg-surface-container-lowest border-b border-outline-variant sticky top-0 z-[110] shadow-sm">
        <nav class="flex justify-between items-center w-full px-margin py-2 max-w-[1440px] mx-auto">
            <div class="flex items-center gap-2">
                @if(!empty($settings->site_logo))
                    <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="Logo" class="h-10 object-contain">
                @else
                    <img src="{{ asset('img/LOGO BLANCO HORIZONTAL .webp') }}" alt="Logo BET CAPITAL SAC" class="h-10 object-contain brightness-0 dark:brightness-100">
                @endif
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('inicio') }}" class="font-label-bold text-label-bold {{ Route::is('inicio') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Inicio</a>
                <a href="{{ route('nosotros') }}" class="font-label-bold text-label-bold {{ Route::is('nosotros') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Nosotros</a>
                <a href="{{ route('servicios') }}" class="font-label-bold text-label-bold {{ Route::is('servicios') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Servicios</a>
                <a href="{{ route('flota') }}" class="font-label-bold text-label-bold {{ Route::is('flota') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Flota</a>
                <a href="{{ route('certificaciones') }}" class="font-label-bold text-label-bold {{ Route::is('certificaciones') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Certificaciones</a>
                <a href="{{ route('contacto') }}" class="font-label-bold text-label-bold {{ Route::is('contacto') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Contacto</a>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('contacto') }}#contact" class="hidden lg:block bg-primary-container text-on-primary px-6 py-2 rounded font-label-bold text-label-bold hover:bg-primary transition-colors text-white">
                    Cotizar
                </a>
                <button class="md:hidden text-primary" id="mobile-menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation Menu -->
        <div class="hidden md:hidden border-t border-outline-variant bg-surface-container-lowest px-margin py-4 space-y-3" id="mobile-menu">
            <a href="{{ route('inicio') }}" class="block font-label-bold text-sm {{ Route::is('inicio') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Inicio</a>
            <a href="{{ route('nosotros') }}" class="block font-label-bold text-sm {{ Route::is('nosotros') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Nosotros</a>
            <a href="{{ route('servicios') }}" class="block font-label-bold text-sm {{ Route::is('servicios') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Servicios</a>
            <a href="{{ route('flota') }}" class="block font-label-bold text-sm {{ Route::is('flota') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Nuestra Flota</a>
            <a href="{{ route('certificaciones') }}" class="block font-label-bold text-sm {{ Route::is('certificaciones') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Certificaciones</a>
            <a href="{{ route('documentacion') }}" class="block font-label-bold text-sm {{ Route::is('documentacion') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Documentación</a>
            <a href="{{ route('contacto') }}#join-fleet" class="block font-label-bold text-sm {{ Route::is('contacto') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Trabaja con Nosotros</a>
            <a href="{{ route('contacto') }}" class="block font-label-bold text-sm {{ Route::is('contacto') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Contacto</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- WhatsApp Floating Button -->
    @if(!empty($settings->whatsapp_number))
        <aside class="fixed bottom-8 right-8 z-[100] flex flex-col items-end group">
            <div class="bg-surface-container-lowest border border-outline shadow-lg rounded-xl p-6 mb-2 scale-0 group-hover:scale-100 origin-bottom-right transition-transform duration-300">
                <p class="font-label-bold text-label-bold text-primary">Atención Rápida</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant">¿Deseas una cotización inmediata?</p>
            </div>
            <a class="bg-[#25D366] hover:bg-[#20ba5a] text-white rounded-full p-4 shadow-md hover:scale-110 transition-transform duration-300 flex items-center justify-center relative" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp_number) }}" target="_blank">
                <svg class="w-7 h-7 fill-current text-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.012 2c-5.506 0-9.988 4.482-9.988 9.988 0 1.76.459 3.414 1.266 4.862l-1.344 4.908 5.034-1.32c1.406.768 3.006 1.206 4.71 1.206 5.506 0 9.988-4.482 9.988-9.988 0-5.506-4.482-9.988-9.988-9.988zm4.848 14.13c-.228.642-1.308 1.218-1.806 1.272-.456.048-.906.204-2.928-.606-2.586-1.038-4.236-3.666-4.362-3.834-.126-.168-1.026-1.362-1.026-2.598 0-1.236.648-1.842.876-2.094.228-.252.504-.318.672-.318.168 0 .336.006.48.012.15.006.354-.06.552.42.204.498.702 1.716.762 1.842.06.126.102.27.018.438-.084.168-.126.27-.252.42-.126.15-.264.336-.378.45-.126.126-.258.264-.108.522.15.252.666 1.098 1.428 1.776.978.87 1.8.138 2.052.264.252-.126.54-.624.672-.834.132-.21.264-.174.456-.102.192.072 1.218.576 1.428.678.21.102.348.15.402.24.054.09.054.522-.174 1.164z"/>
                </svg>
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-white"></span>
                </span>
            </a>
        </aside>
    @endif

    <!-- Footer -->
    <footer class="bg-ocean-deep border-t border-outline-variant text-white">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 px-margin py-12 w-full max-w-[1440px] mx-auto">
            
            <!-- Columna 1: Logo e Identidad -->
            <div class="md:col-span-4 space-y-4">
                <div class="flex flex-col gap-2">
                    <img src="{{ asset('img/LOGO BLANCO HORIZONTAL .webp') }}" alt="Logo BET CAPITAL SAC" class="h-10 object-contain w-max">
                    <div class="font-headline-md text-headline-md font-bold text-white">
                        BET CAPITAL SAC
                    </div>
                </div>
                <p class="font-body-md text-body-md text-surface-variant opacity-80 leading-relaxed text-sm">
                    Socio estratégico en logística de alto impacto. Comprometidos con la excelencia operativa y el desarrollo del comercio nacional e internacional.
                </p>
            </div>

            <!-- Columna 2: Explorar -->
            <div class="md:col-span-2 space-y-4">
                <h5 class="font-label-bold text-label-bold text-white uppercase tracking-wider text-sm">Explorar</h5>
                <ul class="space-y-2.5">
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('servicios') }}">Servicios</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('flota') }}">Nuestra Flota</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('certificaciones') }}">Certificaciones</a></li>
                </ul>
            </div>

            <!-- Columna 3: Soporte y Recursos -->
            <div class="md:col-span-2 space-y-4">
                <h5 class="font-label-bold text-label-bold text-white uppercase tracking-wider text-sm">Recursos</h5>
                <ul class="space-y-2.5">
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('documentacion') }}">Documentación</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('contacto') }}#join-fleet">Trabaja con Nosotros</a></li>
                </ul>
            </div>

            <!-- Columna 4: Ubicación y Horario -->
            <div class="md:col-span-4 space-y-4">
                <h5 class="font-label-bold text-label-bold text-white uppercase tracking-wider text-sm">Sede Callao</h5>
                <p class="font-label-sm text-label-sm text-surface-variant opacity-80 leading-relaxed text-sm">
                    <strong>Dirección:</strong> {{ $settings->office_address }}<br>
                    <strong>Correo:</strong> {{ $settings->email }}<br>
                    <strong>Teléfono:</strong> {{ $settings->phone }}<br>
                    <strong>Horario:</strong> {{ $settings->office_hours }}
                </p>
            </div>

            <!-- Fila Inferior: Derechos, Créditos y Links Legales -->
            <div class="md:col-span-12 pt-8 mt-8 border-t border-outline/30 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p class="font-label-sm text-label-sm text-surface-variant opacity-60 text-center md:text-left">
                    © {{ date('Y') }} BET CAPITAL SAC. Todos los derechos reservados. | Desarrollado por <a href="https://vesergenperu.com/" target="_blank" class="hover:text-transit-blue underline">GRUPO VESERGENPERU</a>
                </p>
                <div class="flex gap-6 justify-center">
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="{{ route('privacidad') }}">Privacidad</a>
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="{{ route('terminos') }}">Términos</a>
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="{{ route('reclamos') }}">Libro de Reclamaciones</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu & Scroll Reveal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }

            // Intersection Observer for premium entrance animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });

            document.querySelectorAll('.scroll-reveal').forEach((el) => {
                observer.observe(el);
            });
        });
    </script>
    <!-- Floating Toast Notifications -->
    @if(session('success_message') || session('success_message_accounting') || session('success_postulacion') || session('success_claim'))
        <div id="toast-notification" class="fixed bottom-5 left-5 z-[200] max-w-sm bg-ocean-deep border border-electric-cyan text-white p-4 shadow-2xl rounded-sm transform translate-y-10 opacity-0 transition-all duration-500 ease-out flex items-start gap-3">
            <span class="material-symbols-outlined text-electric-cyan text-2xl">check_circle</span>
            <div>
                <p class="font-label-bold text-sm font-semibold">¡Operación Exitosa!</p>
                <p class="font-label-sm text-xs text-primary-fixed opacity-90 mt-1">
                    {{ session('success_message') ?? session('success_message_accounting') ?? session('success_postulacion') ?? session('success_claim') }}
                </p>
            </div>
            <button onclick="document.getElementById('toast-notification').classList.add('opacity-0', 'translate-y-10')" class="text-white/60 hover:text-white transition-colors ml-auto">
                <span class="material-symbols-outlined text-base">close</span>
            </button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toast = document.getElementById('toast-notification');
                if (toast) {
                    setTimeout(() => {
                        toast.classList.remove('opacity-0', 'translate-y-10');
                        toast.classList.add('opacity-100', 'translate-y-0');
                    }, 100);
                    setTimeout(() => {
                        toast.classList.remove('opacity-100', 'translate-y-0');
                        toast.classList.add('opacity-0', 'translate-y-10');
                    }, 6000);
                }
            });
        </script>
    @endif
</body>
</html>
