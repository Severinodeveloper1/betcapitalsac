@extends('layouts.app')

@section('title', 'Documentación y Capacitaciones | BET CAPITAL SAC')

@section('content')
    <!-- Banner Principal con corte diagonal -->
    <section class="relative h-[320px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-primary/60 z-10"></div>
            <div class="w-full h-full bg-cover bg-center brightness-50" style="background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1200')"></div>
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-6">
            <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Recursos Compartidos</span>
            <h1 class="font-headline-xl text-headline-xl text-white">Centro de Documentación</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">Consulte y descargue nuestros manuales de capacitación, políticas corporativas y documentos legales.</p>
        </div>
    </section>

    <!-- Listado de Documentos -->
    <section class="py-16 bg-surface-bright">
        <div class="max-w-[1440px] mx-auto px-margin">

            @php
                $categories = [
                    'capacitacion' => ['title' => 'Capacitaciones y Seguridad', 'icon' => 'school', 'color' => 'text-transit-blue'],
                    'legal' => ['title' => 'Documentos Legales y Homologaciones', 'icon' => 'gavel', 'color' => 'text-red-600'],
                    'general' => ['title' => 'General / Otros Documentos', 'icon' => 'folder', 'color' => 'text-orange-500']
                ];
            @endphp

            <div class="space-y-12">
                @foreach($categories as $key => $catInfo)
                    @php
                        $catDocs = $documents->where('category', $key);
                    @endphp

                    @if($catDocs->count() > 0)
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 border-b border-outline-variant pb-3">
                                <span class="material-symbols-outlined text-3xl {{ $catInfo['color'] }}">{{ $catInfo['icon'] }}</span>
                                <h2 class="font-headline-lg text-headline-lg text-ocean-deep">{{ $catInfo['title'] }}</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($catDocs as $doc)
                                    <div class="bg-surface-container-lowest border border-outline-variant rounded-sm p-6 hover:shadow-md hover:border-transit-blue transition-all flex flex-col justify-between">
                                        <div class="space-y-3">
                                            <div class="flex items-start justify-between gap-4">
                                                <h3 class="font-title-md text-title-md text-ocean-deep font-bold line-clamp-2">{{ $doc->title }}</h3>
                                                <span class="text-xs font-semibold px-2 py-1 bg-surface-container-low text-on-surface-variant rounded-sm capitalize">
                                                    {{ pathinfo($doc->file_path, PATHINFO_EXTENSION) ?: 'Archivo' }}
                                                </span>
                                            </div>
                                            @if($doc->description)
                                                <p class="font-body-md text-body-md text-on-surface-variant text-sm line-clamp-3 leading-relaxed">
                                                    {{ $doc->description }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="pt-6">
                                            <a class="shimmer-btn inline-flex items-center justify-center gap-2 w-full bg-transit-blue text-white text-xs font-semibold py-2.5 rounded-sm hover:bg-transit-blue/95 transition-colors uppercase tracking-wider" 
                                               href="{{ asset('storage/' . $doc->file_path) }}" 
                                               target="_blank">
                                                <span class="material-symbols-outlined text-sm">download</span>
                                                Descargar Documento
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach

                @if($documents->count() === 0)
                    <div class="text-center py-20 bg-surface-container-lowest border border-outline-variant rounded-sm">
                        <span class="material-symbols-outlined text-6xl text-on-surface-variant/40 mb-3">folder_open</span>
                        <h3 class="font-headline-md text-headline-md text-ocean-deep mb-2">No hay documentos disponibles</h3>
                        <p class="text-on-surface-variant max-w-md mx-auto">Actualmente no se han subido capacitaciones ni archivos legales. Vuelva a consultar más tarde.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
