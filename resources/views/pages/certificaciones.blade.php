@extends('layouts.app')

@section('title', 'Certificaciones y Proyectos - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-ocean-deep text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center scroll-reveal zoom-in visible">
        <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Garantía Corporativa</span>
        <h1 class="font-display-lg text-display-lg text-white">Certificaciones y Operaciones</h1>
        <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl mx-auto opacity-80 pt-2">
            Acreditaciones internacionales y registro visual de nuestras operaciones logísticas de alta complejidad en todo el Perú.
        </p>
    </div>
</section>

<!-- Certificaciones -->
@if($certifications->count() > 0)
    <section class="px-margin max-w-[1440px] mx-auto py-16">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6 pb-6 border-b border-outline-variant scroll-reveal">
            <div class="space-y-2 w-full md:w-1/2">
                <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold">Acreditación</span>
                <h2 class="font-headline-lg text-headline-lg text-ocean-deep">Homologaciones del Sector</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant w-full md:w-1/2 lg:max-w-md text-sm leading-relaxed">
                Mantenemos nuestros estándares operativos auditados y certificados para garantizar la seguridad de su carga en puertos y almacenes nacionales.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($certifications as $cert)
                <div class="bg-surface-container-lowest border border-outline-variant p-4 flex flex-col hover:border-transit-blue transition-all duration-300 group rounded-sm scroll-reveal zoom-in">
                    <div class="aspect-[3/4] bg-surface-container-low overflow-hidden relative rounded-sm mb-4">
                        @if(!empty($cert->image))
                            <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="{{ str_starts_with($cert->image, 'http') ? $cert->image : asset('storage/' . $cert->image) }}" alt="{{ $cert->title }}"/>
                        @endif
                        <div class="absolute inset-0 bg-ocean-deep/5 mix-blend-multiply pointer-events-none"></div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-label-bold text-label-bold text-ocean-deep font-bold">{{ $cert->title }}</h3>
                        <p class="font-label-sm text-xs text-transit-blue font-semibold">{{ $cert->validity }}</p>
                        <p class="font-body-md text-xs text-on-surface-variant line-clamp-3">
                            {{ $cert->description }}
                        </p>
                    </div>
                    
                    @if(!empty($cert->pdf_file))
                        <a href="{{ asset('storage/' . $cert->pdf_file) }}" target="_blank" class="mt-4 flex items-center justify-center gap-2 bg-surface-container-low text-transit-blue py-2 rounded-sm font-label-bold text-label-bold hover:bg-transit-blue hover:text-white transition-all duration-300 text-xs font-bold w-full">
                            <span class="material-symbols-outlined text-[18px]">download</span>
                            Descargar Documento
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif

<!-- Proyectos Portafolio -->
@if($projects->count() > 0)
    <section class="bg-ocean-deep text-white overflow-hidden py-16">
        <div class="px-margin max-w-[1440px] mx-auto">
            <div class="grid grid-cols-12 gap-6 mb-12 pb-6 border-b border-white/10 scroll-reveal">
                <div class="col-span-12 lg:col-span-6 space-y-2">
                    <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest font-semibold">Portafolio en Acción</span>
                    <h2 class="font-headline-lg text-headline-lg text-white">Operaciones Recientes</h2>
                    <p class="font-body-md text-body-md opacity-85 text-sm">
                        Resumen visual de nuestra capacidad logística. Desde el transporte de maquinaria pesada hasta traslados portuarios prioritarios.
                    </p>
                </div>
            </div>
            
            <!-- Simple Responsive Grid functioning as Masonry -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <div class="group relative overflow-hidden rounded-sm bg-slate-800 shadow-md aspect-video md:aspect-[4/3] scroll-reveal zoom-in">
                        @if(!empty($project->image))
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" alt="{{ $project->title }}"/>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-ocean-deep/95 via-ocean-deep/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h4 class="font-label-bold text-label-bold text-white font-bold">{{ $project->title }}</h4>
                            <p class="font-label-sm text-xs text-electric-cyan">{{ $project->client_or_project }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
