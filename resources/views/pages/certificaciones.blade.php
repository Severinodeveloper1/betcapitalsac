@extends('layouts.app')

@section('title', 'Certificaciones y Proyectos - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center">
        <h1 class="font-display-lg text-4xl md:text-5xl font-bold mb-4">Garantía de Calidad y Portafolio</h1>
        <p class="font-body-lg text-surface-variant max-w-2xl mx-auto text-slate-300">
            Acreditaciones internacionales y registro visual de nuestras operaciones logísticas de alta complejidad en todo el Perú.
        </p>
    </div>
</section>

<!-- Certificaciones & Repositorio -->
@if($certifications->count() > 0)
    <section class="py-xl px-margin max-w-[1440px] mx-auto py-16">
        <div class="flex flex-col md:flex-row justify-between items-end mb-lg gap-sm pb-6 border-b border-slate-200 mb-8">
            <div>
                <span class="text-primary font-label-bold text-label-bold uppercase tracking-widest block mb-xs text-xs font-bold">Garantía de Calidad</span>
                <h2 class="font-headline-lg text-headline-lg text-on-surface text-3xl font-bold">Certificaciones y Documentación</h2>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-md text-sm text-slate-600">
                Acceda a nuestro repositorio oficial de documentos. Mantenemos nuestros estándares actualizados para garantizar la seguridad de su carga.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter gap-6">
            @foreach($certifications as $cert)
                <div class="bg-surface-container-lowest border border-outline-variant p-sm flex flex-col hover:border-primary transition-all duration-300 group rounded-lg p-4 bg-white hover:shadow-md">
                    <div class="aspect-[3/4] bg-surface-container-high mb-sm overflow-hidden relative bg-slate-100 rounded-sm mb-4">
                        @if(!empty($cert->image))
                            <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" src="{{ $cert->image }}" alt="{{ $cert->title }}"/>
                        @endif
                    </div>
                    <h3 class="font-label-bold text-label-bold text-on-surface font-bold text-sm mb-1">{{ $cert->title }}</h3>
                    <p class="font-label-sm text-label-sm text-on-surface-variant text-xs text-slate-500 mb-2">{{ $cert->validity }}</p>
                    <p class="font-label-sm text-label-sm text-on-surface-variant text-xs text-slate-600 mb-4 line-clamp-3">{{ $cert->description }}</p>
                    
                    @if(!empty($cert->pdf_file))
                        <button onclick="window.open('{{ asset('storage/' . $cert->pdf_file) }}', '_blank')" class="mt-auto flex items-center justify-center gap-xs bg-slate-100 text-primary py-xs font-label-bold text-label-bold rounded hover:bg-primary hover:text-white transition-all text-xs font-bold py-2 w-full">
                            <span class="material-symbols-outlined text-[18px] mr-1">download</span>
                            Descargar PDF
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif

<!-- Proyectos Masonry Gallery -->
@if($projects->count() > 0)
    <section class="py-xl bg-on-surface text-surface-container-lowest overflow-hidden bg-slate-900 py-16 text-white">
        <div class="px-margin max-w-[1440px] mx-auto">
            <div class="grid grid-cols-12 gap-gutter mb-lg pb-6 border-b border-white/10 mb-8">
                <div class="col-span-12 lg:col-span-6">
                    <span class="text-primary-fixed-dim font-label-bold text-label-bold uppercase tracking-widest block mb-xs text-sky-400 text-xs font-bold">Portafolio en Acción</span>
                    <h2 class="font-headline-lg text-headline-lg text-white text-3xl font-bold">Proyectos y Operaciones Recientes</h2>
                    <p class="font-body-md text-body-md text-surface-variant opacity-80 text-sm text-slate-300">
                        Documentamos visualmente nuestra capacidad operativa. Desde transporte de maquinaria pesada hasta logística de contenedores de alta prioridad.
                    </p>
                </div>
            </div>
            
            <!-- Simple Responsive Grid functioning as Masonry -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    <div class="group relative overflow-hidden rounded-lg bg-slate-800 shadow-lg aspect-video md:aspect-[4/3]">
                        @if(!empty($project->image))
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ $project->image }}" alt="{{ $project->title }}"/>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h4 class="font-label-bold text-label-bold text-white font-bold text-sm mb-1">{{ $project->title }}</h4>
                            <p class="text-label-sm text-surface-variant text-xs text-slate-300">{{ $project->client_or_project }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
