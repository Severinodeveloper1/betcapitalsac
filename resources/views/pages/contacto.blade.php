@extends('layouts.app')

@section('title', 'Contacto y Trabajo - BETCAPITALSAC')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-16">
    <div class="max-w-[1440px] mx-auto px-margin text-center">
        <h1 class="font-display-lg text-4xl md:text-5xl font-bold mb-4">Trabaja con Nosotros y Contacto</h1>
        <p class="font-body-lg text-surface-variant max-w-2xl mx-auto text-slate-300">
            ¿Quieres solicitar una cotización o formar parte de nuestra flota homologada? Completa el formulario correspondiente y te atenderemos de inmediato.
        </p>
    </div>
</section>

<!-- Beneficios de Trabajar con BETCAPITALSAC -->
@if($benefits->count() > 0)
    <section class="py-16 bg-slate-50">
        <div class="max-w-[1440px] mx-auto px-margin">
            <div class="text-center mb-12">
                <h2 class="font-headline-lg text-headline-lg text-primary text-3xl font-bold mb-2">Beneficios de Trabajar con BETCAPITALSAC</h2>
                <div class="h-1 w-24 bg-primary mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter gap-6">
                @foreach($benefits as $benefit)
                    <div class="bg-white p-6 border border-outline-variant hover:border-primary transition-colors rounded-lg shadow-sm group">
                        <div class="w-16 h-16 bg-primary-container rounded-full flex items-center justify-center mb-md group-hover:scale-110 transition-transform bg-primary text-white p-4 mb-4">
                            <span class="material-symbols-outlined text-3xl">{{ $benefit->icon }}</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-primary mb-sm font-bold text-lg mb-2">{{ $benefit->title }}</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant text-sm text-slate-600 leading-relaxed">{{ $benefit->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Sección de Contacto General -->
<section class="py-16" id="contact">
    <div class="max-w-[1440px] mx-auto px-margin grid grid-cols-1 lg:grid-cols-12 gap-xl gap-8">
        <div class="lg:col-span-5 flex flex-col justify-between">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-primary text-3xl font-bold mb-4">Consultas de Logística y Carga</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 text-slate-600 leading-relaxed">
                    ¿Necesita mover carga pesada o gestionar su cadena de suministro? Nuestro equipo técnico está listo para diseñar la solución perfecta para su empresa.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start gap-sm gap-3">
                        <span class="material-symbols-outlined text-primary text-2xl text-slate-800">location_on</span>
                        <div>
                            <p class="font-label-bold text-label-bold text-primary font-bold text-sm">Oficina Principal</p>
                            <p class="font-body-md text-body-md text-on-surface-variant text-sm text-slate-600">{{ $settings->office_address }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-sm gap-3">
                        <span class="material-symbols-outlined text-primary text-2xl text-slate-800">mail</span>
                        <div>
                            <p class="font-label-bold text-label-bold text-primary font-bold text-sm">Correo Electrónico</p>
                            <p class="font-body-md text-body-md text-on-surface-variant text-sm text-slate-600">{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-sm gap-3">
                        <span class="material-symbols-outlined text-primary text-2xl text-slate-800">call</span>
                        <div>
                            <p class="font-label-bold text-label-bold text-primary font-bold text-sm">Atención Comercial</p>
                            <p class="font-body-md text-body-md text-on-surface-variant text-sm text-slate-600">{{ $settings->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-7 bg-white p-lg border border-outline-variant rounded-lg shadow-sm p-8 bg-white border rounded-xl">
            @if(session('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success_message') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contacto.mensaje') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-md gap-4">
                    <div class="space-y-xs">
                        <label class="font-label-bold text-label-bold text-on-surface text-sm font-bold block mb-1">Nombre Completo</label>
                        <input name="name" required class="w-full p-2 border border-outline rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm border-slate-300 rounded" placeholder="Ej: Juan Pérez" type="text" value="{{ old('name') }}"/>
                    </div>
                    <div class="space-y-xs">
                        <label class="font-label-bold text-label-bold text-on-surface text-sm font-bold block mb-1">Empresa</label>
                        <input name="company" class="w-full p-2 border border-outline rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm border-slate-300 rounded" placeholder="Nombre de su organización" type="text" value="{{ old('company') }}"/>
                    </div>
                </div>
                <div class="space-y-xs">
                    <label class="font-label-bold text-label-bold text-on-surface text-sm font-bold block mb-1">Correo Corporativo</label>
                    <input name="email" required class="w-full p-2 border border-outline rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm border-slate-300 rounded" placeholder="usuario@empresa.com" type="email" value="{{ old('email') }}"/>
                </div>
                <div class="space-y-xs">
                    <label class="font-label-bold text-label-bold text-on-surface text-sm font-bold block mb-1">Mensaje</label>
                    <textarea name="message" required class="w-full p-2 border border-outline rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all text-sm border-slate-300 rounded" placeholder="Describa brevemente sus requerimientos de carga..." rows="4">{{ old('message') }}</textarea>
                </div>
                <button class="w-full bg-primary text-white font-label-bold text-label-bold py-3 rounded-lg hover:bg-slate-800 transition-colors font-bold text-sm bg-slate-900" type="submit">Enviar Solicitud</button>
            </form>
        </div>
    </div>
</section>

<!-- Sección de Postulación (Trabaja con Nosotros) -->
<section class="py-16 bg-slate-900 text-white" id="join-fleet">
    <div class="max-w-[1440px] mx-auto px-margin">
        <div class="flex flex-col lg:flex-row gap-xl gap-8 items-center">
            <div class="lg:w-1/2 space-y-4">
                <h2 class="font-headline-lg text-headline-lg text-sky-400 text-3xl font-bold mb-4">Registro para Evaluación de Transportistas</h2>
                <p class="font-body-lg text-body-lg opacity-80 mb-8 text-sm text-slate-300 leading-relaxed">¿Eres dueño de flota o transportista independiente? Estamos buscando socios estratégicos que compartan nuestra visión de excelencia y puntualidad.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-md gap-4">
                    <div class="flex items-center gap-sm gap-2 bg-white/5 p-sm border border-white/10 p-3 rounded">
                        <span class="material-symbols-outlined text-sky-400 mr-1">verified</span>
                        <span class="font-label-bold text-label-bold text-xs font-bold">Unidades Homologadas</span>
                    </div>
                    <div class="flex items-center gap-sm gap-2 bg-white/5 p-sm border border-white/10 p-3 rounded">
                        <span class="material-symbols-outlined text-sky-400 mr-1">distance</span>
                        <span class="font-label-bold text-label-bold text-xs font-bold">Rutas Nacionales</span>
                    </div>
                    <div class="flex items-center gap-sm gap-2 bg-white/5 p-sm border border-white/10 p-3 rounded">
                        <span class="material-symbols-outlined text-sky-400 mr-1">schedule</span>
                        <span class="font-label-bold text-label-bold text-xs font-bold">Carga Recurrente</span>
                    </div>
                    <div class="flex items-center gap-sm gap-2 bg-white/5 p-sm border border-white/10 p-3 rounded">
                        <span class="material-symbols-outlined text-sky-400 mr-1">support_agent</span>
                        <span class="font-label-bold text-label-bold text-xs font-bold">Monitoreo 24/7</span>
                    </div>
                </div>
            </div>
            
            <div class="lg:w-1/2 w-full text-slate-900">
                <div class="bg-white p-8 rounded-xl shadow-lg bg-white">
                    @if(session('success_postulacion'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm" role="alert">
                            <strong class="font-bold">¡Postulado!</strong>
                            <span class="block sm:inline">{{ session('success_postulacion') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contacto.postulacion') }}" method="POST" class="space-y-4">
                        @csrf
                        <p class="font-label-bold text-label-bold text-primary border-l-4 border-primary pl-2 mb-4 font-bold text-sm text-slate-800">Datos de Contacto</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm gap-4">
                            <input name="driver_name" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300" placeholder="Nombre completo" type="text" value="{{ old('driver_name') }}"/>
                            <input name="phone" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300" placeholder="Teléfono / WhatsApp" type="tel" value="{{ old('phone') }}"/>
                        </div>
                        
                        <p class="font-label-bold text-label-bold text-primary border-l-4 border-primary pl-2 mt-6 mb-4 font-bold text-sm text-slate-800">Datos de la Unidad</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm gap-4">
                            <select name="vehicle_type" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300">
                                <option value="">Tipo de Vehículo</option>
                                <option {{ old('vehicle_type') === 'Furgón' ? 'selected' : '' }}>Furgón</option>
                                <option {{ old('vehicle_type') === 'Plataforma' ? 'selected' : '' }}>Plataforma</option>
                                <option {{ old('vehicle_type') === 'Cisternas' ? 'selected' : '' }}>Cisternas</option>
                                <option {{ old('vehicle_type') === 'Cama Baja' ? 'selected' : '' }}>Cama Baja</option>
                            </select>
                            <input name="vehicle_plate" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300" placeholder="Placa del Vehículo" type="text" value="{{ old('vehicle_plate') }}"/>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm gap-4">
                            <input name="license_number" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300" placeholder="Número de Licencia" type="text" value="{{ old('license_number') }}"/>
                            <input name="vehicle_year" required class="w-full p-2 bg-background border border-outline-variant focus:ring-primary rounded outline-none text-sm border-slate-300" placeholder="Año del Vehículo (ej: 2018)" type="text" value="{{ old('vehicle_year') }}"/>
                        </div>
                        <button class="w-full bg-primary-container text-white font-label-bold text-label-bold py-3 rounded-lg hover:scale-[1.02] transition-all mt-4 uppercase tracking-wider font-bold text-sm bg-slate-900" type="submit">Enviar Postulación</button>
                        <p class="text-center font-label-sm text-label-sm text-on-surface-variant mt-3 text-xs text-slate-500">Al enviar, usted acepta nuestra política de privacidad y términos de evaluación.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa y Datos -->
<section class="py-16">
    <div class="max-w-[1440px] mx-auto px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter gap-6 items-stretch">
            <div class="lg:col-span-8 h-[400px] bg-slate-200 shadow-inner border border-outline-variant overflow-hidden rounded-lg">
                @if(!empty($settings->map_iframe_url))
                    <iframe src="{{ $settings->map_iframe_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full grayscale hover:grayscale-0 transition-all duration-700"></iframe>
                @else
                    <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-100">
                        Mapa no configurado
                    </div>
                @endif
            </div>
            
            <div class="lg:col-span-4 flex flex-col justify-center gap-md gap-4">
                <div class="p-lg bg-primary-fixed rounded-lg border border-primary/10 bg-slate-50 p-6 border rounded-xl">
                    <h3 class="font-headline-md text-headline-md text-on-primary-fixed mb-sm font-bold text-lg mb-2">Sede Callao</h3>
                    <p class="font-body-md text-body-md text-on-primary-fixed-variant mb-lg text-sm text-slate-600 mb-6">Nuestra ubicación estratégica cerca del puerto nos permite una respuesta inmediata ante cualquier desafío logístico.</p>
                    <div class="space-y-3">
                        <a class="flex items-center justify-between bg-white p-sm rounded hover:bg-slate-100 transition-colors p-3 shadow-sm border border-slate-100 text-sm font-bold" href="https://maps.google.com/?q={{ urlencode($settings->office_address) }}" target="_blank">
                            <span class="text-primary font-bold">Cómo llegar</span>
                            <span class="material-symbols-outlined text-primary text-xl text-slate-900">directions</span>
                        </a>
                        @if(!empty($settings->whatsapp_number))
                            <a class="flex items-center justify-between bg-[#25D366] text-white p-sm rounded hover:opacity-90 transition-opacity p-3 text-sm font-bold" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp_number) }}" target="_blank">
                                <span>WhatsApp Rápido</span>
                                <span class="material-symbols-outlined text-xl">chat</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="p-lg bg-surface-container border border-outline-variant rounded-lg bg-slate-50 p-6 border rounded-xl">
                    <p class="font-label-bold text-label-bold text-primary font-bold text-sm text-slate-800 mb-1">Horario de Atención</p>
                    <p class="font-body-md text-body-md text-sm text-slate-600">{{ $settings->office_hours }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
