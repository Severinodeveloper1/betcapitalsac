<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings->seo_title ?? 'BETCAPITALSAC - Logística Pesada')</title>
    <meta name="description" content="@yield('meta_description', $settings->seo_description ?? '')">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=block" rel="stylesheet">
    
    <!-- Favicon -->
    @if(!empty($settings->site_favicon))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings->site_favicon) }}">
    @endif

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-surface font-sans antialiased overflow-x-hidden">

    <!-- TopNavBar -->
    <header class="bg-surface-container-lowest border-b border-outline-variant sticky top-0 z-[110] shadow-sm">
        <nav class="flex justify-between items-center w-full px-margin py-xs max-w-[1440px] mx-auto">
            <div class="flex items-center gap-xs">
                @if(!empty($settings->site_logo))
                    <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="Logo" class="h-10 object-contain">
                @else
                    <div class="font-headline-md text-headline-md font-bold text-primary">
                        BETCAPITALSAC
                    </div>
                @endif
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-gutter">
                <a href="{{ route('inicio') }}" class="font-label-bold text-label-bold {{ Route::is('inicio') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Inicio</a>
                <a href="{{ route('nosotros') }}" class="font-label-bold text-label-bold {{ Route::is('nosotros') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Nosotros</a>
                <a href="{{ route('servicios') }}" class="font-label-bold text-label-bold {{ Route::is('servicios') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Servicios</a>
                <a href="{{ route('flota') }}" class="font-label-bold text-label-bold {{ Route::is('flota') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Flota</a>
                <a href="{{ route('certificaciones') }}" class="font-label-bold text-label-bold {{ Route::is('certificaciones') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Certificaciones</a>
                <a href="{{ route('contacto') }}" class="font-label-bold text-label-bold {{ Route::is('contacto') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors duration-200">Contacto</a>
            </div>

            <div class="flex items-center gap-sm">
                <a href="{{ route('contacto') }}#contact" class="hidden lg:block bg-primary-container text-on-primary px-6 py-2 rounded font-label-bold text-label-bold hover:bg-primary transition-colors text-white">
                    Cotizar
                </a>
                <button class="md:hidden text-primary" id="mobile-menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation Menu -->
        <div class="hidden md:hidden border-t border-outline-variant bg-surface-container-lowest px-margin py-sm space-y-sm" id="mobile-menu">
            <a href="{{ route('inicio') }}" class="block font-label-bold text-label-bold {{ Route::is('inicio') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Inicio</a>
            <a href="{{ route('nosotros') }}" class="block font-label-bold text-label-bold {{ Route::is('nosotros') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Nosotros</a>
            <a href="{{ route('servicios') }}" class="block font-label-bold text-label-bold {{ Route::is('servicios') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Servicios</a>
            <a href="{{ route('flota') }}" class="block font-label-bold text-label-bold {{ Route::is('flota') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Flota</a>
            <a href="{{ route('certificaciones') }}" class="block font-label-bold text-label-bold {{ Route::is('certificaciones') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Certificaciones</a>
            <a href="{{ route('contacto') }}" class="block font-label-bold text-label-bold {{ Route::is('contacto') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Contacto</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- WhatsApp Floating Button -->
    @if(!empty($settings->whatsapp_number))
        <aside class="fixed bottom-8 right-8 z-[100] flex flex-col items-end group">
            <div class="bg-surface-container-lowest border border-outline shadow-lg rounded-xl p-md mb-xs scale-0 group-hover:scale-100 origin-bottom-right transition-transform duration-300">
                <p class="font-label-bold text-label-bold text-primary">Atención Rápida</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant">¿Deseas una cotización inmediata?</p>
            </div>
            <a class="bg-tertiary-container text-on-tertiary-container rounded-full p-4 shadow-md hover:scale-110 transition-transform duration-300 flex items-center justify-center relative text-white" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp_number) }}" target="_blank">
                <span class="material-symbols-outlined text-3xl">chat</span>
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-on-tertiary-container opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-on-tertiary-container"></span>
                </span>
            </a>
        </aside>
    @endif

    <!-- Footer -->
    <footer class="bg-on-surface dark:bg-surface-container-lowest border-t border-outline text-white">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter px-margin py-lg w-full max-w-[1440px] mx-auto">
            <div class="md:col-span-4 space-y-md">
                <div class="font-headline-lg text-headline-lg font-bold text-white">
                    BETCAPITALSAC
                </div>
                <p class="font-body-md text-body-md text-surface-variant opacity-80">
                    Socio estratégico en logística de alto impacto. Comprometidos con el desarrollo del comercio exterior peruano.
                </p>
            </div>
            <div class="md:col-span-2 space-y-md">
                <h5 class="font-label-bold text-label-bold text-white uppercase">Explorar</h5>
                <ul class="space-y-xs">
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('servicios') }}">Servicios</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('certificaciones') }}">Proyectos</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('certificaciones') }}">Certificaciones</a></li>
                </ul>
            </div>
            <div class="md:col-span-2 space-y-md">
                <h5 class="font-label-bold text-label-bold text-white uppercase">Compañía</h5>
                <ul class="space-y-xs">
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('nosotros') }}">Nosotros</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('contacto') }}#join-fleet">Trabaja con Nosotros</a></li>
                    <li><a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim transition-colors" href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="md:col-span-4 space-y-md">
                <h5 class="font-label-bold text-label-bold text-white uppercase">Ubicación y Horario</h5>
                <p class="font-label-sm text-label-sm text-surface-variant opacity-80">
                    <strong>Dirección:</strong> {{ $settings->office_address }}<br>
                    <strong>Correo:</strong> {{ $settings->email }}<br>
                    <strong>Teléfono:</strong> {{ $settings->phone }}<br>
                    <strong>Horario:</strong> {{ $settings->office_hours }}
                </p>
            </div>
            <div class="md:col-span-12 pt-lg mt-lg border-t border-outline/30 flex flex-col md:flex-row justify-between items-center gap-md">
                <p class="font-label-sm text-label-sm text-surface-variant opacity-60">
                    © {{ date('Y') }} BETCAPITALSAC. Todos los derechos reservados.
                </p>
                <div class="flex gap-md">
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="#">Privacidad</a>
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="#">Términos</a>
                    <a class="font-label-sm text-label-sm text-surface-variant opacity-80 hover:text-primary-fixed-dim" href="#">Libro de Reclamaciones</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
