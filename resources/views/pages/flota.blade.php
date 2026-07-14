@extends('layouts.app')

@section('title', 'Nuestra Flota Logística - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-16 mb-12">
    <div class="max-w-[1440px] mx-auto px-margin text-center">
        <span class="text-transit-blue font-label-sm uppercase tracking-widest mb-2 block text-sky-400 font-bold text-sm">Excelencia en Transporte</span>
        <h1 class="font-display-lg text-4xl md:text-5xl font-bold mb-4">Nuestra Flota de Alto Rendimiento</h1>
        <p class="font-body-lg text-surface-variant max-w-2xl mx-auto text-slate-300">
            Contamos con una infraestructura vehicular moderna y diversificada, diseñada para enfrentar los desafíos logísticos más exigentes con precisión y seguridad garantizada.
        </p>
    </div>
</section>

<!-- Fleet Grid -->
<section class="px-margin max-w-[1440px] mx-auto grid grid-cols-1 md:grid-cols-12 gap-gutter gap-6 pb-16">
    <!-- Category Sidebar -->
    <aside class="md:col-span-3 space-y-6">
        <div class="bg-surface-container p-6 rounded-xl border border-outline-variant bg-slate-50 p-6 border rounded-xl">
            <h3 class="font-title-md text-ocean-deep font-bold mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined">filter_list</span>
                Categorías
            </h3>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('flota') }}" class="block w-full text-left px-4 py-2 rounded-lg font-bold text-sm transition-all {{ !request()->filled('categoria') ? 'bg-primary text-white' : 'text-on-surface-variant hover:bg-slate-100' }}">Todos los Vehículos</a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('flota', ['categoria' => $category->slug]) }}" class="block w-full text-left px-4 py-2 rounded-lg font-bold text-sm transition-all {{ request('categoria') === $category->slug ? 'bg-primary text-white' : 'text-on-surface-variant hover:bg-slate-100' }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <div class="bg-primary-container p-6 rounded-xl text-white relative overflow-hidden bg-slate-900 p-6 border rounded-xl">
            <div class="relative z-10">
                <h4 class="font-title-md mb-2 font-bold">¿Necesitas capacidad especial?</h4>
                <p class="font-label-sm opacity-80 mb-4 text-xs">Gestionamos cargas sobredimensionadas y refrigeradas.</p>
                <a href="{{ route('contacto') }}" class="text-sky-400 font-bold flex items-center gap-1 hover:gap-2 transition-all text-sm">
                    Consultar <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-20 text-white">
                <span class="material-symbols-outlined text-8xl">precision_manufacturing</span>
            </div>
        </div>
    </aside>

    <!-- Fleet Cards Grid -->
    <div class="md:col-span-9 grid grid-cols-1 lg:grid-cols-2 gap-gutter gap-6">
        @forelse($vehicles as $vehicle)
            <div class="bg-white rounded-xl border border-surface-variant overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="h-64 overflow-hidden relative bg-slate-200">
                        @if(!empty($vehicle->image))
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $vehicle->image }}" alt="{{ $vehicle->name }}"/>
                        @endif
                        @if(!empty($vehicle->badge))
                            <div class="absolute top-4 right-4 bg-caution-gold text-ocean-deep font-label-sm px-3 py-1 rounded-full flex items-center gap-1 bg-yellow-100 text-yellow-800 font-bold text-xs">
                                <span class="material-symbols-outlined text-xs" style="font-variation-settings: 'FILL' 1;">bolt</span>
                                {{ $vehicle->badge }}
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-headline-lg text-ocean-deep text-xl font-bold">{{ $vehicle->name }}</h3>
                                <p class="text-transit-blue font-label-sm text-sky-500 text-xs">{{ $vehicle->category->name ?? '' }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-surface-gray p-3 rounded-lg flex items-center gap-3 bg-slate-50 p-3">
                                <span class="material-symbols-outlined text-ocean-deep text-slate-600">weight</span>
                                <div>
                                    <p class="text-[10px] text-on-surface-variant uppercase font-bold text-slate-500">Capacidad</p>
                                    <p class="font-title-md text-ocean-deep leading-tight font-bold text-sm">{{ $vehicle->capacity }}</p>
                                </div>
                            </div>
                            <div class="bg-surface-gray p-3 rounded-lg flex items-center gap-3 bg-slate-50 p-3">
                                <span class="material-symbols-outlined text-ocean-deep text-slate-600">straighten</span>
                                <div>
                                    <p class="text-[10px] text-on-surface-variant uppercase font-bold text-slate-500">Dimensiones</p>
                                    <p class="font-title-md text-ocean-deep leading-tight font-bold text-sm">{{ $vehicle->dimensions }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-6 text-sm">
                            <div class="flex justify-between border-b border-surface-variant pb-2">
                                <span class="text-on-surface-variant text-slate-500">Tipo de Carga</span>
                                <span class="font-bold">{{ $vehicle->load_type }}</span>
                            </div>
                            <div class="flex justify-between border-b border-surface-variant pb-2">
                                <span class="text-on-surface-variant text-slate-500">Rastreo GPS</span>
                                <span class="text-transit-blue font-bold flex items-center gap-1 text-sky-500">
                                    {{ $vehicle->gps_status }} 
                                    <span class="w-2 h-2 bg-transit-blue rounded-full bg-sky-500"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    @if(!empty($vehicle->brochure))
                        <a href="{{ asset('storage/' . $vehicle->brochure) }}" target="_blank" class="block w-full py-3 text-center border-2 border-ocean-deep text-ocean-deep font-bold rounded-lg hover:bg-ocean-deep hover:text-white transition-all text-sm border-slate-900 text-slate-900 hover:bg-slate-900">
                            Ver Ficha Técnica
                        </a>
                    @else
                        <a href="{{ route('contacto') }}" class="block w-full py-3 text-center border-2 border-ocean-deep text-ocean-deep font-bold rounded-lg hover:bg-ocean-deep hover:text-white transition-all text-sm border-slate-900 text-slate-900 hover:bg-slate-900">
                            Solicitar Información
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-12 text-slate-500">
                No se encontraron vehículos disponibles en esta categoría.
            </div>
        @endforelse
    </div>
</section>
@endsection
