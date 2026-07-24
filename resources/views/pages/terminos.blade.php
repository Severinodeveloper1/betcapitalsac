@extends('layouts.app')

@section('title', 'Términos y Condiciones | BET CAPITAL SAC')

@section('content')
    <!-- Header/Hero simple con corte diagonal -->
    <section class="relative h-[280px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-primary/60 z-10"></div>
            <div class="w-full h-full bg-cover bg-center brightness-50" style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1200')"></div>
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-6">
            <h1 class="font-headline-xl text-headline-xl text-white">Términos de Servicio</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">Normativas y condiciones legales de uso de nuestro sitio web y servicios.</p>
        </div>
    </section>

    <!-- Contenedor con Índice a la Izquierda e Información a la Derecha -->
    <section class="py-16 bg-surface-bright">
        <div class="max-w-[1440px] mx-auto px-margin">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Índice a la Izquierda -->
                <aside class="lg:col-span-4 bg-surface-container-lowest border border-outline-variant p-6 rounded-sm sticky top-24">
                    <h3 class="font-label-bold text-label-bold text-ocean-deep uppercase tracking-widest border-b border-outline-variant pb-3 mb-4">Índice de Cláusulas</h3>
                    <nav class="space-y-2">
                        @forelse($clauses as $clause)
                            <a href="#{{ $clause->slug }}" class="block text-sm font-medium text-on-surface-variant hover:text-transit-blue hover:translate-x-1 transition-all">
                                {{ $clause->title }}
                            </a>
                        @empty
                            <p class="text-xs text-on-surface-variant/70 italic">No hay cláusulas registradas.</p>
                        @endforelse
                    </nav>
                </aside>

                <!-- Información a la Derecha -->
                <main class="lg:col-span-8 bg-surface-container-lowest border border-outline-variant p-8 rounded-sm space-y-8">
                    @forelse($clauses as $clause)
                        <article id="{{ $clause->slug }}" class="scroll-mt-28 space-y-3 pb-6 border-b border-outline-variant/30 last:border-0 last:pb-0">
                            <h2 class="font-headline-md text-headline-md text-ocean-deep font-bold border-l-4 border-transit-blue pl-3">
                                {{ $clause->title }}
                            </h2>
                            <div class="font-body-md text-body-md text-on-surface-variant leading-relaxed whitespace-pre-line">
                                {{ $clause->content }}
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-12">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant/40 mb-2">gavel</span>
                            <p class="text-on-surface-variant">Términos y condiciones en proceso de actualización.</p>
                        </div>
                    @endempty
                </main>

            </div>
        </div>
    </section>
@endsection
