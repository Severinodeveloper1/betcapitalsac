@extends('layouts.app')

@section('title', 'Contacto y Trabajo - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-ocean-deep text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center scroll-reveal zoom-in visible">
        <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Contacto</span>
        <h1 class="font-display-lg text-display-lg text-white">Canales de Atención</h1>
        <p class="font-body-lg text-body-lg text-surface-container-highest max-w-2xl mx-auto opacity-80 pt-2">
            ¿Desea solicitar una cotización o registrarse como transportista homologado? Seleccione el canal correspondiente.
        </p>
    </div>
</section>

<!-- Beneficios de Trabajar con BETCAPITALSAC -->
@if($benefits->count() > 0)
    <section class="py-16 bg-surface-container-low border-b border-outline-variant">
        <div class="max-w-[1440px] mx-auto px-margin">
            <div class="text-center mb-12 scroll-reveal">
                <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block mb-2">Beneficios</span>
                <h2 class="font-headline-lg text-headline-lg text-ocean-deep">¿Por qué trabajar con nosotros?</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($benefits as $benefit)
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm hover:border-transit-blue hover:shadow-md transition-all duration-300 group scroll-reveal zoom-in p-6">
                        <div class="w-12 h-12 bg-surface-container-low rounded-sm flex items-center justify-center text-transit-blue mb-4 group-hover:bg-transit-blue group-hover:text-white transition-all duration-300">
                            <span class="material-symbols-outlined text-2xl">{{ $benefit->icon }}</span>
                        </div>
                        <h3 class="font-title-md text-title-md text-ocean-deep mb-2 font-semibold">{{ $benefit->title }}</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                            {{ $benefit->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Sección de Contacto General -->
<section class="py-16 border-b border-outline-variant" id="contact">
    <div class="max-w-[1440px] mx-auto px-margin grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-5 flex flex-col justify-between scroll-reveal slide-left">
            <div class="space-y-6">
                <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block">Cotizaciones</span>
                <h2 class="font-headline-lg text-headline-lg text-ocean-deep">Consultas Comerciales</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed opacity-90">
                    ¿Necesita mover carga pesada o gestionar logística en puerto? Nuestro equipo comercial le responderá de inmediato con una oferta adaptada.
                </p>
                <div class="space-y-6 pt-6">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-transit-blue text-2xl">location_on</span>
                        <div class="space-y-[2px]">
                            <p class="font-label-bold text-label-bold text-ocean-deep">Oficina Principal</p>
                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $settings->office_address }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-transit-blue text-2xl">mail</span>
                        <div class="space-y-[2px]">
                            <p class="font-label-bold text-label-bold text-ocean-deep">Correo Electrónico</p>
                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-transit-blue text-2xl">call</span>
                        <div class="space-y-[2px]">
                            <p class="font-label-bold text-label-bold text-ocean-deep">Teléfono de Atención</p>
                            <p class="font-body-md text-body-md text-on-surface-variant">{{ $settings->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-7 bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm scroll-reveal slide-right p-8">
            @if(session('success_message'))
                <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-sm text-sm font-label-bold mb-4" role="alert">
                    {{ session('success_message') }}
                </div>
            @endif

            <form action="{{ route('contacto.mensaje') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-[2px]">
                        <label class="font-label-bold text-label-bold text-on-surface">Nombre Completo</label>
                        <input name="name" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Juan Pérez" type="text" value="{{ old('name') }}"/>
                    </div>
                    <div class="space-y-[2px]">
                        <label class="font-label-bold text-label-bold text-on-surface">Empresa</label>
                        <input name="company" class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Razón Social" type="text" value="{{ old('company') }}"/>
                    </div>
                </div>
                <div class="space-y-[2px]">
                    <label class="font-label-bold text-label-bold text-on-surface">Correo Electrónico</label>
                    <input name="email" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="usuario@empresa.com" type="email" value="{{ old('email') }}"/>
                </div>
                <div class="space-y-[2px]">
                    <label class="font-label-bold text-label-bold text-on-surface">Mensaje / Requerimiento</label>
                    <textarea name="message" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Describa el origen, destino y tipo de carga..." rows="4">{{ old('message') }}</textarea>
                </div>
                <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3 rounded-sm hover:bg-transit-blue/90 transition-colors" type="submit">Enviar Consulta</button>
            </form>
        </div>
    </div>
</section>

<!-- Sección de Postulación (Trabaja con Nosotros) -->
<section class="py-16 bg-ocean-deep text-white" id="join-fleet">
    <div class="max-w-[1440px] mx-auto px-margin">
        <div class="flex flex-col lg:flex-row gap-8 items-center">
            
            <div class="lg:w-1/2 space-y-6 scroll-reveal slide-left">
                <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest font-semibold block">Convocatoria</span>
                <h2 class="font-headline-lg text-headline-lg text-white">Registro de Transportistas</h2>
                <p class="font-body-lg text-body-lg opacity-85 leading-relaxed">
                    ¿Es dueño de flota o conductor independiente de carga pesada? Únase a nuestra red homologada de distribución nacional.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-2 text-white">
                    <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-sm p-3">
                        <span class="material-symbols-outlined text-electric-cyan">verified</span>
                        <span class="font-label-bold text-xs font-semibold">Unidades Homologadas</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 border border-white/10 rounded-sm p-3">
                        <span class="material-symbols-outlined text-electric-cyan">distance</span>
                        <span class="font-label-bold text-xs font-semibold">Rutas Nacionales</span>
                    </div>
                </div>
            </div>
            
            <div class="lg:w-1/2 w-full text-on-surface scroll-reveal slide-right">
                <div class="bg-surface-container-lowest border border-outline-variant rounded-sm shadow-lg p-8 bg-white">
                    @if(session('success_postulacion'))
                        <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-sm text-sm font-label-bold mb-4" role="alert">
                            {{ session('success_postulacion') }}
                        </div>
                    @endif

                    <form action="{{ route('contacto.postulacion') }}" method="POST" class="space-y-4">
                        @csrf
                        <p class="font-label-bold text-label-bold text-ocean-deep border-l-2 border-transit-blue pl-2 font-semibold">Datos Personales</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input name="driver_name" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Nombre completo" type="text" value="{{ old('driver_name') }}"/>
                            <input name="phone" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Teléfono" type="tel" value="{{ old('phone') }}"/>
                        </div>
                        
                        <p class="font-label-bold text-label-bold text-ocean-deep border-l-2 border-transit-blue pl-2 font-semibold pt-4">Especificaciones Vehiculares</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <select name="vehicle_type" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm border-0 border-b-2">
                                <option value="">Tipo de Vehículo</option>
                                <option {{ old('vehicle_type') === 'Furgón' ? 'selected' : '' }}>Furgón</option>
                                <option {{ old('vehicle_type') === 'Plataforma' ? 'selected' : '' }}>Plataforma</option>
                                <option {{ old('vehicle_type') === 'Cisternas' ? 'selected' : '' }}>Cisternas</option>
                                <option {{ old('vehicle_type') === 'Cama Baja' ? 'selected' : '' }}>Cama Baja</option>
                            </select>
                            <input name="vehicle_plate" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Placa" type="text" value="{{ old('vehicle_plate') }}"/>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input name="license_number" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Licencia de Conducir" type="text" value="{{ old('license_number') }}"/>
                            <input name="vehicle_year" required class="w-full p-2.5 bg-surface-gray border-b-2 border-outline-variant focus:border-electric-cyan focus:outline-none transition-all text-sm rounded-t-sm" placeholder="Año del Vehículo" type="text" value="{{ old('vehicle_year') }}"/>
                        </div>
                        <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3 rounded-sm hover:bg-transit-blue/90 transition-colors mt-4 uppercase tracking-wider font-semibold text-xs" type="submit">Enviar Postulación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa e Iframe -->
<section class="py-16">
    <div class="max-w-[1440px] mx-auto px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            <div class="lg:col-span-8 h-[400px] border border-outline-variant rounded-sm overflow-hidden shadow-sm scroll-reveal slide-left">
                @if(!empty($settings->map_iframe_url))
                    <iframe src="{{ $settings->map_iframe_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full grayscale hover:grayscale-0 transition-all duration-700"></iframe>
                @else
                    <div class="w-full h-full flex items-center justify-center text-on-surface-variant bg-surface-container">
                        Mapa de ubicación no disponible.
                    </div>
                @endif
            </div>
            
            <div class="lg:col-span-4 flex flex-col justify-between gap-4 scroll-reveal slide-right">
                <div class="bg-surface-container-low border border-outline-variant rounded-sm p-6">
                    <h3 class="font-title-md text-title-md text-ocean-deep mb-2 font-semibold">Sede Operativa Callao</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-4 leading-relaxed text-sm">
                        Ubicación estratégica que facilita las coordinaciones de resguardo y control del comercio marítimo y de aduanas.
                    </p>
                    <div class="space-y-4 pt-2">
                        <a class="flex items-center justify-between bg-surface-container-lowest border border-outline-variant rounded-sm hover:border-transit-blue transition-colors text-sm font-semibold p-3" href="https://maps.google.com/?q={{ urlencode($settings->office_address) }}" target="_blank">
                            <span class="text-transit-blue">Ver en Google Maps</span>
                            <span class="material-symbols-outlined text-transit-blue">directions</span>
                        </a>
                        @if(!empty($settings->whatsapp_number))
                            <a class="flex items-center justify-between bg-green-600 text-white rounded-sm hover:bg-green-700 transition-colors text-sm font-semibold p-3" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp_number) }}" target="_blank">
                                <span>Coordinar Vía WhatsApp</span>
                                <span class="material-symbols-outlined">chat</span>
                            </a>
                        @endif
                    </div>
                </div>
                
                <div class="bg-surface-container-low border border-outline-variant rounded-sm p-6">
                    <p class="font-label-bold text-label-bold text-ocean-deep mb-2 font-semibold">Horario Corporativo</p>
                    <p class="font-body-md text-body-md text-on-surface-variant text-sm">{{ $settings->office_hours }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
