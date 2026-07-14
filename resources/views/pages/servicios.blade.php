@extends('layouts.app')

@section('title', 'Servicios Integrales - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-ocean-deep text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center scroll-reveal zoom-in visible">
        <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Operaciones</span>
        <h1 class="font-display-lg text-display-lg text-white">Servicios y Soluciones Integradas</h1>
        <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl mx-auto opacity-80 pt-2">
            Infraestructura y equipo experto para liderar los desafíos de la cadena de suministro y logística pesada del país.
        </p>
    </div>
</section>

<!-- Services Sections Loop -->
<main class="py-20 space-y-20">
    @foreach($services as $index => $service)
        <section class="relative scroll-mt-20 max-w-[1440px] mx-auto px-margin" id="{{ $service->slug }}">
            <div class="relative h-[60vh] min-h-[480px] flex flex-col justify-center overflow-hidden rounded-sm border border-outline-variant shadow-sm scroll-reveal {{ $index % 2 === 0 ? 'slide-left' : 'slide-right' }}">
                
                <!-- Background Image Zoom -->
                <div class="absolute inset-0 bg-cover bg-center hero-image-zoom" style="background-image: url('{{ $service->cover_image }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-ocean-deep/95 via-ocean-deep/60 to-transparent"></div>
                
                <div class="relative w-full p-6 md:p-8 text-white z-10">
                    <div class="max-w-xl glass-panel p-6 md:p-8 rounded-sm text-white shadow-lg space-y-6">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-electric-cyan text-3xl">{{ $service->icon_name }}</span>
                            <span class="font-label-sm text-label-sm uppercase tracking-widest text-electric-cyan">Línea Operativa</span>
                        </div>
                        
                        <h2 class="font-headline-lg text-headline-lg text-white font-bold">{{ $service->name }}</h2>
                        
                        <p class="font-body-md text-body-md opacity-90 leading-relaxed text-slate-100">
                            {{ $service->description }}
                        </p>
                        
                        <div class="flex flex-wrap gap-4 pt-2">
                            @if(!empty($service->cta_text))
                                <a href="{{ $service->cta_url ?? route('contacto') }}" class="shimmer-btn bg-transit-blue text-white px-6 py-3 rounded-sm font-label-bold text-label-bold">
                                    {{ $service->cta_text }}
                                </a>
                            @endif
                            @if(!empty($service->brochure_file))
                                <a href="{{ asset('storage/' . $service->brochure_file) }}" target="_blank" class="border border-white/50 text-white px-6 py-3 rounded-sm font-label-bold text-label-bold hover:bg-white/10 hover:border-white transition-all duration-300 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-sm">download</span>
                                    Ficha Técnica
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Evidence Gallery with Glassmorphism Hover -->
            @if(!empty($service->evidence_images) && is_array($service->evidence_images) && count($service->evidence_images) > 0)
                <div class="bg-surface-container-low border-x border-b border-outline-variant rounded-b-sm scroll-reveal zoom-in p-6">
                    <p class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/70 mb-4">Evidencia de Operaciones</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($service->evidence_images as $image)
                            <div class="relative overflow-hidden aspect-video rounded-sm shadow-sm group">
                                <img alt="Operación {{ $service->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 cursor-pointer" src="{{ $image }}"/>
                                <div class="absolute inset-0 bg-ocean-deep/10 opacity-100 group-hover:opacity-0 transition-opacity"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
    @endforeach
</main>
@endsection
