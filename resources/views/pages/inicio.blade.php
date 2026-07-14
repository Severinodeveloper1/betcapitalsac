@extends('layouts.app')

@section('title', $page->meta_title ?? 'Inicio - BETCAPITALSAC')
@section('meta_description', $page->meta_description ?? '')

@section('content')
<!-- Hero Banner -->
<section class="relative w-full h-[85vh] overflow-hidden bg-primary">
    <div class="absolute inset-0 z-0">
        @if(!empty($page->hero_image))
            <div class="w-full h-full bg-cover bg-center brightness-50" style="background-image: url('{{ $page->hero_image }}')"></div>
        @else
            <div class="w-full h-full bg-slate-800"></div>
        @endif
    </div>
    <!-- Kinetic Overlays -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/10 backdrop-blur-sm -skew-x-12 translate-x-1/2 pointer-events-none"></div>
    <div class="relative z-10 h-full max-w-[1440px] mx-auto px-margin flex flex-col justify-center items-start text-white">
        <div class="max-w-3xl space-y-md">
            @if(!empty($page->section_data['empresa_homologada']) && $page->section_data['empresa_homologada'])
                <div class="inline-flex items-center gap-xs bg-primary-container/80 px-4 py-2 rounded-full border border-primary-fixed-dim/30">
                    <span class="material-symbols-outlined text-on-tertiary-container" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                    <span class="font-label-bold text-label-bold uppercase tracking-wider text-on-primary">Empresa Homologada</span>
                </div>
            @endif
            <h1 class="font-headline-xl text-headline-xl max-w-2xl leading-tight text-5xl md:text-6xl font-bold">
                {{ $page->hero_title }}
            </h1>
            <p class="font-body-lg text-body-lg text-surface-container-highest max-w-xl text-lg">
                {{ $page->hero_subtitle }}
            </p>
            <div class="flex flex-wrap gap-md pt-sm">
                @if(!empty($page->hero_cta_text))
                    <a href="{{ $page->hero_cta_url ?? '#contact' }}" class="bg-on-secondary text-primary px-8 py-4 rounded-lg font-label-bold text-label-bold flex items-center gap-xs hover:bg-primary-fixed transition-transform active:scale-95 group shadow-md">
                        {{ $page->hero_cta_text }}
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>
                @endif
                <a href="{{ route('certificaciones') }}" class="border border-on-primary text-on-primary px-8 py-4 rounded-lg font-label-bold text-label-bold hover:bg-white/10 transition-colors">
                    Ver Certificados
                </a>
            </div>
        </div>
    </div>
    <!-- Scroll Indicator -->
    <div class="absolute bottom-md left-1/2 -translate-x-1/2 flex flex-col items-center gap-xs animate-bounce opacity-70">
        <span class="font-label-sm text-label-sm text-white">Descubrir</span>
        <span class="material-symbols-outlined text-white">keyboard_arrow_down</span>
    </div>
</section>

<!-- Trusted Partners Tape -->
@if($partners->count() > 0)
    <div class="bg-on-surface py-md border-t border-outline/20">
        <div class="max-w-[1440px] mx-auto px-margin">
            <p class="text-center font-label-bold text-label-bold text-surface-variant/60 mb-sm uppercase tracking-widest text-xs">Nuestros Aliados Estratégicos</p>
            <div class="flex flex-wrap justify-center items-center gap-xl opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                @foreach($partners as $partner)
                    <div class="flex items-center gap-xs text-white">
                        @if(!empty($partner->logo))
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-8 object-contain">
                        @else
                            <div class="w-8 h-8 bg-surface-variant/20 rounded flex items-center justify-center">
                                <span class="material-symbols-outlined text-surface-variant text-xl">directions_boat</span>
                            </div>
                        @endif
                        <span class="font-headline-md text-headline-md text-white font-bold">{{ $partner->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<!-- Main Content Bento Grid -->
<main class="max-w-[1440px] mx-auto px-margin py-xl space-y-xl">
    
    <!-- Homologation & Capability Section -->
    @if(!empty($page->section_data['homologation_title']))
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-stretch">
            <div class="md:col-span-7 bg-surface-container-low p-lg border border-outline-variant flex flex-col justify-center rounded-lg p-8">
                <h2 class="font-headline-lg text-headline-lg text-primary mb-md text-3xl font-bold mb-4">
                    {{ $page->section_data['homologation_title'] }}
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-lg leading-relaxed mb-6">
                    {{ $page->section_data['homologation_description'] }}
                </p>
                @if(!empty($page->section_data['homologation_features']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-md gap-6">
                        @foreach($page->section_data['homologation_features'] as $feat)
                            <div class="flex items-start gap-xs gap-3">
                                <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $feat['icon'] ?? 'shield_check' }}</span>
                                <div>
                                    <p class="font-label-bold text-label-bold font-bold text-sm">{{ $feat['title'] }}</p>
                                    <p class="font-label-sm text-label-sm text-on-surface-variant text-xs">{{ $feat['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="md:col-span-5 h-[400px] relative rounded-lg overflow-hidden shadow-md">
                @if(!empty($page->section_data['homologation_image']))
                    <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ $page->section_data['homologation_image'] }}')"></div>
                @else
                    <div class="w-full h-full bg-slate-300"></div>
                @endif
                <div class="absolute inset-0 bg-primary/20 mix-blend-multiply"></div>
            </div>
        </div>
    @endif

    <!-- Core Services -->
    @if($services->count() > 0)
        <section class="space-y-md pt-8">
            <div class="flex flex-col md:flex-row justify-between items-end gap-md border-b border-outline-variant pb-md pb-4 mb-6">
                <div>
                    <h3 class="font-headline-md text-headline-md text-primary text-2xl font-bold">Soluciones Logísticas Integrales</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Estructura operativa diseñada para el transporte de alto tonelaje.</p>
                </div>
                <a href="{{ route('servicios') }}" class="text-primary font-label-bold text-label-bold flex items-center gap-xs group font-bold">
                    Explorar todos los servicios
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">chevron_right</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter gap-6">
                @foreach($services as $service)
                    <div class="group bg-surface-container-lowest border border-outline-variant p-md hover:border-primary transition-all duration-300 rounded-lg p-6 shadow-sm hover:shadow-md">
                        <div class="bg-primary-container w-12 h-12 flex items-center justify-center rounded-lg mb-md text-white mb-4 bg-primary p-2">
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'wght' 700;">{{ $service->icon_name }}</span>
                        </div>
                        <h4 class="font-headline-md text-headline-md mb-xs font-bold text-lg mb-2">{{ $service->name }}</h4>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-md text-sm mb-4 line-clamp-3">{{ $service->description }}</p>
                        <a class="inline-block text-primary font-label-bold text-label-bold font-bold hover:underline" href="{{ route('servicios') }}#{{ $service->slug }}">Más información</a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</main>
@endsection
