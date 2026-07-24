@extends('layouts.app')

@section('title', 'Servicios Integrales - BET CAPITAL SAC')

@section('content')
    <!-- Hero Section con Zoom Lento y corte diagonal -->
    <section class="relative h-[480px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            @if (!empty($page->hero_image))
                <div class="w-full h-full bg-cover bg-center brightness-50 hero-image-zoom"
                    style="background-image: url('{{ str_starts_with($page->hero_image, 'http') ? $page->hero_image : asset('storage/' . $page->hero_image) }}')">
                </div>
            @else
                <div class="w-full h-full bg-slate-800 hero-image-zoom"></div>
            @endif
            @if(!empty($page->hero_title) || !empty($page->hero_subtitle))
                <div class="absolute inset-0 bg-primary/60 z-10"></div>
            @endif
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-10">
            <div class="max-w-2xl">
                <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Operaciones</span>
                <h1 class="font-headline-xl text-headline-xl text-white mb-md">{{ $page->hero_title ?? 'Servicios' }}</h1>
                <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">{{ $page->hero_subtitle ?? '' }}</p>
            </div>
        </div>
    </section>

    <!-- Services Sections Loop -->
    <main class="py-20 space-y-20">
        @foreach ($services as $index => $service)
            <section class="relative scroll-mt-20 max-w-[1440px] mx-auto px-margin" id="{{ $service->slug }}">
                <div
                    class="relative h-[60vh] min-h-[480px] flex flex-col justify-center overflow-hidden rounded-sm border border-outline-variant shadow-sm scroll-reveal {{ $index % 2 === 0 ? 'slide-left' : 'slide-right' }}">

                    <!-- Background Image Zoom -->
                    <div class="absolute inset-0 bg-cover bg-center hero-image-zoom"
                        style="background-image: url('{{ str_starts_with($service->cover_image, 'http') ? $service->cover_image : asset('storage/' . $service->cover_image) }}');">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-ocean-deep/95 via-ocean-deep/60 to-transparent">
                    </div>

                    <div class="relative w-full p-6 md:p-8 z-10">
                        <div class="max-w-xl bg-ocean-deep/85 backdrop-blur-md border border-white/15 p-6 md:p-8 rounded-sm shadow-xl space-y-6 text-white">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-electric-cyan text-3xl">{{ $service->icon_name }}</span>
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-electric-cyan font-semibold">Línea Operativa</span>
                            </div>

                            <h2 class="font-headline-lg text-headline-lg text-white font-bold">{{ $service->name }}</h2>

                            <p class="font-body-md text-body-md text-slate-200 leading-relaxed">
                                {{ $service->description }}
                            </p>

                            <div class="flex flex-wrap gap-4 pt-2">
                                @if (!empty($service->cta_text))
                                    <a href="{{ $service->cta_url ?? route('contacto') }}"
                                        class="shimmer-btn bg-transit-blue text-white px-6 py-3 rounded-sm font-label-bold text-label-bold">
                                        {{ $service->cta_text }}
                                    </a>
                                @endif
                                @if (!empty($service->brochure_file))
                                    <a href="{{ asset('storage/' . $service->brochure_file) }}" target="_blank"
                                        class="border border-white/50 text-white px-6 py-3 rounded-sm font-label-bold text-label-bold hover:bg-white/10 hover:border-white transition-all duration-300 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-sm">download</span>
                                        Ficha Técnica
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Evidence Gallery with Glassmorphism Hover -->
                @if (!empty($service->evidence_images) && is_array($service->evidence_images) && count($service->evidence_images) > 0)
                    <div
                        class="bg-surface-container-low border-x border-b border-outline-variant rounded-b-sm scroll-reveal zoom-in p-6">
                        <p class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant/70 mb-4">
                            Evidencia de Operaciones</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($service->evidence_images as $image)
                                <div class="relative overflow-hidden aspect-video rounded-sm shadow-sm group">
                                    <img alt="Operación {{ $service->name }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 cursor-pointer"
                                        src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}" 
                                        onclick="openLightbox(this.src)" />
                                    <div
                                        class="absolute inset-0 bg-ocean-deep/10 opacity-100 group-hover:opacity-0 transition-opacity pointer-events-none">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </section>
        @endforeach
    </main>

    <!-- Lightbox Modal para Visualización Detallada de Evidencias -->
    <div id="image-lightbox" class="fixed inset-0 bg-black/85 z-[300] hidden items-center justify-center p-4 backdrop-blur-sm opacity-0 transition-opacity duration-300 ease-in-out" onclick="closeLightbox()">
        <button class="absolute top-5 right-5 text-white/80 hover:text-white transition-colors" onclick="closeLightbox(event)">
            <span class="material-symbols-outlined text-4xl">close</span>
        </button>
        <img id="lightbox-img" class="max-w-full max-h-[90vh] object-contain rounded-sm transform scale-95 transition-transform duration-300 ease-in-out" src="" alt="Operación en detalle" onclick="event.stopPropagation()">
    </div>

    <script>
        function openLightbox(src) {
            const lightbox = document.getElementById('image-lightbox');
            const img = document.getElementById('lightbox-img');
            if (lightbox && img) {
                img.src = src;
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
                setTimeout(() => {
                    lightbox.classList.remove('opacity-0');
                    lightbox.classList.add('opacity-100');
                    img.classList.remove('scale-95');
                    img.classList.add('scale-100');
                }, 10);
            }
        }

        function closeLightbox(event) {
            if (event) event.stopPropagation();
            const lightbox = document.getElementById('image-lightbox');
            const img = document.getElementById('lightbox-img');
            if (lightbox && img) {
                lightbox.classList.remove('opacity-100');
                lightbox.classList.add('opacity-0');
                img.classList.remove('scale-100');
                img.classList.add('scale-95');
                setTimeout(() => {
                    lightbox.classList.remove('flex');
                    lightbox.classList.add('hidden');
                }, 300);
            }
        }
    </script>
@endsection
