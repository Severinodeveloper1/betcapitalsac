@extends('layouts.app')

@section('title', 'Nuestra Flota Logística - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-ocean-deep text-white py-16 mb-12">
    <div class="max-w-[1440px] mx-auto px-margin text-center scroll-reveal zoom-in visible">
        <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Infraestructura</span>
        <h1 class="font-display-lg text-display-lg text-white">Nuestra Flota de Alto Rendimiento</h1>
        <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl mx-auto opacity-80 pt-2">
            Contamos con una infraestructura vehicular moderna y diversificada, diseñada para enfrentar los desafíos logísticos más exigentes con precisión y seguridad.
        </p>
    </div>
</section>

<!-- Fleet Grid Section -->
<section class="px-margin max-w-[1440px] mx-auto grid grid-cols-1 lg:grid-cols-12 pb-16 gap-6">
    
    <!-- Category Sidebar -->
    <aside class="lg:col-span-3 space-y-4 scroll-reveal slide-left">
        <div class="bg-surface-container-low rounded-sm border border-outline-variant p-6">
            <h3 class="font-title-md text-title-md text-ocean-deep mb-4 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-xl">filter_list</span>
                Categorías
            </h3>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('flota') }}" class="block w-full text-left px-4 py-2 rounded-sm font-label-bold text-label-bold transition-all {{ !request()->filled('categoria') ? 'bg-transit-blue text-white' : 'text-on-surface-variant hover:bg-surface-container' }}">
                        Todos los Vehículos
                    </a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('flota', ['categoria' => $category->slug]) }}" class="block w-full text-left px-4 py-2 rounded-sm font-label-bold text-label-bold transition-all {{ request('categoria') === $category->slug ? 'bg-transit-blue text-white' : 'text-on-surface-variant hover:bg-surface-container' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <div class="bg-primary-container rounded-sm text-white relative overflow-hidden bg-slate-900 border border-outline-variant p-6">
            <div class="relative z-10 space-y-2">
                <h4 class="font-title-md text-title-md text-electric-cyan font-semibold">¿Capacidad especial?</h4>
                <p class="font-label-sm text-xs opacity-80">Gestionamos cargas sobredimensionadas, especiales y refrigeradas.</p>
                <a href="{{ route('contacto') }}" class="text-electric-cyan font-label-bold text-label-bold flex items-center gap-2 hover:gap-4 transition-all pt-2">
                    Consultar <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-10 text-white pointer-events-none">
                <span class="material-symbols-outlined text-[100px]">precision_manufacturing</span>
            </div>
        </div>
    </aside>

    <!-- Fleet Cards Grid -->
    <div class="lg:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($vehicles as $vehicle)
            <div class="bg-surface-container-lowest border border-outline-variant rounded-sm overflow-hidden group hover:border-transit-blue hover:shadow-md transition-all duration-300 flex flex-col justify-between scroll-reveal zoom-in">
                <div>
                    <!-- Vehicle Image -->
                    <div class="h-56 overflow-hidden relative bg-surface-container">
                        @if(!empty($vehicle->image))
                            <img class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" src="{{ str_starts_with($vehicle->image, 'http') ? $vehicle->image : asset('storage/' . $vehicle->image) }}" alt="{{ $vehicle->name }}"/>
                        @endif
                        @if(!empty($vehicle->badge))
                            <div class="absolute top-4 right-4 bg-caution-gold/20 border border-caution-gold/40 text-caution-gold px-3 py-1 rounded-sm font-label-sm text-xs flex items-center gap-2 font-semibold bg-amber-500/10">
                                <span class="material-symbols-outlined text-xs">bolt</span>
                                {{ $vehicle->badge }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="space-y-[2px]">
                            <span class="text-transit-blue font-label-sm text-xs uppercase tracking-wider font-semibold">{{ $vehicle->category->name ?? '' }}</span>
                            <h3 class="font-title-md text-title-md text-ocean-deep font-semibold">{{ $vehicle->name }}</h3>
                        </div>
                        
                        <!-- Specifications -->
                        <div class="grid grid-cols-2 gap-4 pt-2">
                            <div class="bg-surface-container-low rounded-sm flex items-center gap-2 p-3">
                                <span class="material-symbols-outlined text-transit-blue text-xl">weight</span>
                                <div class="space-y-[1px]">
                                    <p class="font-label-sm text-[10px] text-on-surface-variant/70 uppercase">Capacidad</p>
                                    <p class="font-label-bold text-label-bold text-ocean-deep leading-none">{{ $vehicle->capacity }}</p>
                                </div>
                            </div>
                            <div class="bg-surface-container-low rounded-sm flex items-center gap-2 p-3">
                                <span class="material-symbols-outlined text-transit-blue text-xl">straighten</span>
                                <div class="space-y-[1px]">
                                    <p class="font-label-sm text-[10px] text-on-surface-variant/70 uppercase">Dimensiones</p>
                                    <p class="font-label-bold text-label-bold text-ocean-deep leading-none">{{ $vehicle->dimensions }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transports details -->
                        <div class="space-y-2 pt-4 text-sm border-t border-outline-variant">
                            <div class="flex justify-between">
                                <span class="text-on-surface-variant">Tipo de Carga</span>
                                <span class="font-label-bold text-on-surface font-semibold">{{ $vehicle->load_type }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-on-surface-variant">Rastreo Satelital</span>
                                <span class="text-transit-blue font-label-bold flex items-center gap-2 font-semibold">
                                    {{ $vehicle->gps_status }} 
                                    <span class="w-1.5 h-1.5 bg-transit-blue rounded-full animate-pulse"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 pb-6">
                    @if(!empty($vehicle->brochure))
                        <a href="{{ asset('storage/' . $vehicle->brochure) }}" target="_blank" class="block w-full py-2.5 text-center border border-transit-blue text-transit-blue font-label-bold text-label-bold rounded-sm hover:bg-transit-blue hover:text-white transition-all duration-300">
                            Descargar Folleto PDF
                        </a>
                    @else
                        <a href="{{ route('contacto') }}" class="block w-full py-2.5 text-center border border-ocean-deep text-ocean-deep font-label-bold text-label-bold rounded-sm hover:bg-ocean-deep hover:text-white transition-all duration-300">
                            Consultar Disponibilidad
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-12 text-on-surface-variant">
                No se encontraron vehículos disponibles en esta categoría en este momento.
            </div>
        @endforelse
    </div>
</section>
@endsection
