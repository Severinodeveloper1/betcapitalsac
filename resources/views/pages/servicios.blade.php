@extends('layouts.app')

@section('title', 'Servicios Integrales - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center">
        <h1 class="font-display-lg text-4xl md:text-5xl font-bold mb-4">Servicios y Soluciones Integradas</h1>
        <p class="font-body-lg text-surface-variant max-w-2xl mx-auto">
            Infraestructura y equipo experto para liderar los desafíos de la cadena de suministro y logística pesada del país.
        </p>
    </div>
</section>

<!-- Services Sections Loop -->
<main class="space-y-16 py-12">
    @foreach($services as $index => $service)
        <section class="relative scroll-mt-20" id="{{ $service->slug }}">
            <div class="relative h-[65vh] min-h-[500px] flex items-center overflow-hidden">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $service->cover_image }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-transparent"></div>
                
                <div class="relative w-full max-w-[1440px] mx-auto px-margin">
                    <div class="max-w-xl bg-on-surface/40 backdrop-blur-xl border border-surface-container-lowest/20 p-lg rounded-xl text-white shadow-2xl p-8 bg-slate-900/80">
                        <div class="flex items-center gap-xs mb-sm mb-4">
                            <span class="material-symbols-outlined text-primary-fixed text-4xl text-sky-400 mr-2">{{ $service->icon_name }}</span>
                            <span class="font-label-bold text-label-bold uppercase tracking-widest text-sky-400 text-xs font-bold">Servicio Especializado</span>
                        </div>
                        <h2 class="font-headline-xl text-3xl font-bold mb-4">{{ $service->name }}</h2>
                        <p class="font-body-lg text-sm opacity-90 mb-lg mb-6 leading-relaxed">
                            {{ $service->description }}
                        </p>
                        <div class="flex flex-wrap gap-sm gap-4">
                            @if(!empty($service->cta_text))
                                <a href="{{ $service->cta_url ?? route('contacto') }}" class="bg-primary-fixed text-primary px-lg py-3 rounded-lg font-label-bold hover:bg-white transition-colors bg-white text-slate-900 px-6 py-3 font-bold text-sm shadow-sm">
                                    {{ $service->cta_text }}
                                </a>
                            @endif
                            @if(!empty($service->brochure_file))
                                <a href="{{ asset('storage/' . $service->brochure_file) }}" target="_blank" class="bg-transparent border border-white/50 text-white px-lg py-3 rounded-lg font-label-bold hover:bg-white/10 transition-colors px-6 py-3 font-bold text-sm inline-flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px]">description</span>
                                    Ficha Técnica
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Evidence Gallery -->
            @if(!empty($service->evidence_images) && is_array($service->evidence_images) && count($service->evidence_images) > 0)
                <div class="bg-white py-lg border-b border-outline-variant py-8 bg-slate-50">
                    <div class="max-w-[1440px] mx-auto px-margin">
                        <h4 class="font-label-bold text-label-sm uppercase tracking-widest text-secondary text-xs font-bold mb-4">Evidencia de Operaciones</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-sm gap-4">
                            @foreach($service->evidence_images as $image)
                                <img alt="Operación {{ $service->name }}" class="aspect-video object-cover rounded shadow-sm grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer w-full h-40" src="{{ $image }}"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </section>
    @endforeach
</main>
@endsection
