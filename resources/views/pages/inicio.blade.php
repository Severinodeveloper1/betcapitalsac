@extends('layouts.app')

@section('title', $page->meta_title ?? 'Inicio - BETCAPITALSAC')
@section('meta_description', $page->meta_description ?? '')

@section('content')
<!-- Hero Banner con Zoom Lento y Glassmorphism -->
<section class="relative w-full h-[85vh] overflow-hidden bg-ocean-deep flex items-center">
    <div class="absolute inset-0 z-0">
        @if(!empty($page->hero_image))
            <div class="w-full h-full bg-cover bg-center brightness-50 hero-image-zoom" style="background-image: url('{{ str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset('storage/' . $page->hero_image) }}')"></div>
        @else
            <div class="w-full h-full bg-slate-800 hero-image-zoom"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-ocean-deep/90 via-ocean-deep/60 to-transparent"></div>
    </div>
    
    <div class="relative z-10 w-full max-w-[1440px] mx-auto px-margin text-white">
        <div class="max-w-3xl space-y-4 scroll-reveal zoom-in visible">
            @if(!empty($page->section_data['empresa_homologada']) && $page->section_data['empresa_homologada'])
                <div class="inline-flex items-center gap-2 bg-electric-cyan/10 border border-electric-cyan/30 px-4 py-1.5 rounded-sm">
                    <span class="material-symbols-outlined text-electric-cyan text-sm" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest text-electric-cyan">Empresa Homologada</span>
                </div>
            @endif
            
            <h1 class="font-headline-xl text-headline-xl leading-tight">
                {{ $page->hero_title }}
            </h1>
            
            <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl opacity-90">
                {{ $page->hero_subtitle }}
            </p>
            
            <div class="flex flex-wrap gap-4 pt-6">
                @if(!empty($page->hero_cta_text))
                    <a href="{{ $page->hero_cta_url ?? '#contact' }}" class="shimmer-btn bg-transit-blue text-white px-8 py-4 rounded-sm font-label-bold text-label-bold flex items-center gap-2 hover:bg-transit-blue/90 transition-all duration-300">
                        {{ $page->hero_cta_text }}
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                @endif
                <a href="{{ route('certificaciones') }}" class="border border-white/40 text-white px-8 py-4 rounded-sm font-label-bold text-label-bold hover:bg-white/10 hover:border-white transition-all duration-300">
                    Ver Acreditaciones
                </a>
            </div>
        </div>
    </div>

    <!-- Indicador de Scroll -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce opacity-50">
        <span class="font-label-sm text-label-sm text-white">Deslizar</span>
        <span class="material-symbols-outlined text-white text-sm">keyboard_arrow_down</span>
    </div>
</section>

<!-- Aliados Estratégicos -->
@if($partners->count() > 0)
    <div class="bg-surface border-b border-outline-variant py-8">
        <div class="max-w-[1440px] mx-auto px-margin scroll-reveal">
            <p class="text-center font-label-sm text-label-sm text-on-surface-variant/60 mb-4 uppercase tracking-widest">Nuestros Aliados Estratégicos</p>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-55 hover:opacity-85 transition-opacity duration-300">
                @foreach($partners as $partner)
                    <div class="flex items-center gap-2">
                        @if(!empty($partner->logo))
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-6 object-contain">
                        @else
                            <span class="material-symbols-outlined text-on-surface text-xl">directions_boat</span>
                        @endif
                        <span class="font-title-md text-title-md text-on-surface font-bold">{{ $partner->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<!-- Main Content -->
<main class="max-w-[1440px] mx-auto px-margin py-16 space-y-16">
    
    <!-- Sección de Homologación -->
    @if(!empty($page->section_data['homologation_title']))
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            <div class="lg:col-span-7 bg-surface-container-low p-12 border border-outline-variant rounded-sm flex flex-col justify-center scroll-reveal slide-left">
                <h2 class="font-headline-lg text-headline-lg text-ocean-deep mb-6">
                    {{ $page->section_data['homologation_title'] }}
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-12 leading-relaxed">
                    {{ $page->section_data['homologation_description'] }}
                </p>
                
                @if(!empty($page->section_data['homologation_features']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                        @foreach($page->section_data['homologation_features'] as $feat)
                            <div class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-transit-blue text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $feat['icon'] ?? 'shield_check' }}</span>
                                <div class="space-y-[2px]">
                                    <p class="font-label-bold text-label-bold text-on-surface">{{ $feat['title'] }}</p>
                                    <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $feat['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <div class="lg:col-span-5 h-[420px] relative rounded-sm overflow-hidden shadow-sm scroll-reveal slide-right">
                @if(!empty($page->section_data['homologation_image']))
                    <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ str_starts_with($page->section_data['homologation_image'], 'http') ? $page->section_data['homologation_image'] : asset('storage/' . $page->section_data['homologation_image']) }}')"></div>
                @else
                    <div class="w-full h-full bg-slate-300"></div>
                @endif
                <div class="absolute inset-0 bg-ocean-deep/10 mix-blend-multiply"></div>
            </div>
        </div>
    @endif

    <!-- Servicios Principales -->
    @if($services->count() > 0)
        <section class="space-y-12 pt-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 border-b border-outline-variant pb-6 scroll-reveal">
                <div class="space-y-2">
                    <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest">Servicios</span>
                    <h3 class="font-headline-lg text-headline-lg text-ocean-deep">Soluciones Logísticas de Carga Pesada</h3>
                </div>
                <a href="{{ route('servicios') }}" class="text-transit-blue font-label-bold text-label-bold flex items-center gap-2 group">
                    Explorar todos los servicios
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1 text-sm">chevron_right</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="group bg-surface-container-lowest border border-outline-variant p-6 hover:border-transit-blue transition-all duration-300 rounded-sm flex flex-col justify-between scroll-reveal zoom-in">
                        <div class="space-y-4">
                            <div class="bg-surface-container-low w-12 h-12 flex items-center justify-center rounded-sm text-transit-blue group-hover:bg-transit-blue group-hover:text-white transition-all duration-300">
                                <span class="material-symbols-outlined text-2xl">{{ $service->icon_name }}</span>
                            </div>
                            <h4 class="font-title-md text-title-md text-ocean-deep">{{ $service->name }}</h4>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">
                                {{ $service->description }}
                            </p>
                        </div>
                        <div class="pt-6">
                            <a class="inline-flex items-center gap-2 text-transit-blue font-label-bold text-label-bold group/link" href="{{ route('servicios') }}#{{ $service->slug }}">
                                Saber más
                                <span class="material-symbols-outlined text-xs transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</main>
@endsection
