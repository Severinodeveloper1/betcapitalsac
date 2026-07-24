@extends('layouts.app')

@section('title', 'Contacto y Canales de Atención | BET CAPITAL SAC')

@section('content')
    <!-- 1. Banner Principal (Contacto Comercial) -->
    <section class="relative h-[480px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            @if(!empty($page->hero_title) || !empty($page->hero_subtitle))
                <div class="absolute inset-0 bg-primary/60 z-10"></div>
            @endif
            @if(!empty($settings->site_logo))
                <div class="w-full h-full bg-cover bg-center brightness-50 hero-image-zoom" style="background-image: url('{{ asset('img/LOGO BLANCO HORIZONTAL .webp') }}')"></div>
            @else
                <div class="w-full h-full bg-cover bg-center brightness-50 hero-image-zoom" style="background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=1200')"></div>
            @endif
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-10">
            <div class="max-w-2xl">
                <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Canal Comercial</span>
                <h1 class="font-headline-xl text-headline-xl text-white mb-md">{{ $page->hero_title ?? 'Conecta con Nosotros y Potencia tu Operación' }}</h1>
                <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">{{ $page->hero_subtitle ?? 'Llevamos la logística al siguiente nivel. Contáctenos para solicitar cotizaciones comerciales o realizar consultas generales sobre nuestros servicios de transporte pesado.' }}</p>
            </div>
        </div>
    </section>

    <!-- 2. Sección de Beneficios Generales -->
    @if ($benefitsGeneral->count() > 0)
        <section class="py-16 bg-surface-container-low border-b border-outline-variant">
            <div class="max-w-[1440px] mx-auto px-margin">
                <div class="text-center mb-12 scroll-reveal">
                    <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block mb-2">Garantía Bet Capital</span>
                    <h2 class="font-headline-lg text-headline-lg text-ocean-deep">¿Por qué trabajar con nosotros?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($benefitsGeneral as $benefit)
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm hover:border-transit-blue hover:shadow-md transition-all duration-300 group p-6">
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

    <!-- 3. Formulario de Contacto General -->
    <section class="py-16 border-b border-outline-variant" id="contact">
        <div class="max-w-[1440px] mx-auto px-margin grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-5 flex flex-col justify-between">
                <div class="space-y-6">
                    <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block">Cotizaciones</span>
                    <h2 class="font-headline-lg text-headline-lg text-ocean-deep">Consultas Comerciales</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed opacity-90">
                        ¿Necesita mover carga pesada o gestionar logística en puerto? Nuestro equipo comercial le responderá de inmediato con una oferta adaptada a sus necesidades.
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

            <div class="lg:col-span-7 bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm p-8">
                @if (session('success_message'))
                    <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-sm text-sm font-label-bold mb-4" role="alert">
                        {{ session('success_message') }}
                    </div>
                @endif

                <form action="{{ route('contacto.mensaje') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="type" value="general">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Nombre Completo</label>
                            <input name="name" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Juan Pérez" type="text" value="{{ old('name') }}" />
                        </div>
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Empresa</label>
                            <input name="company" class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Razón Social" type="text" value="{{ old('company') }}" />
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Correo Electrónico</label>
                            <input name="email" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="usuario@empresa.com" type="email" value="{{ old('email') }}" />
                        </div>
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Teléfono / Celular</label>
                            <input name="phone" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Ej: +51 987654321" type="tel" value="{{ old('phone') }}" />
                        </div>
                    </div>

                    <div class="space-y-[2px]">
                        <label class="font-label-bold text-label-bold text-on-surface">Mensaje / Requerimiento</label>
                        <textarea name="message" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Describa el origen, destino y tipo de carga..." rows="4">{{ old('message') }}</textarea>
                    </div>
                    
                    <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3 rounded-sm hover:bg-transit-blue/90 transition-colors" type="submit">Enviar Consulta</button>
                </form>
            </div>
        </div>
    </section>

    <!-- 4. Banner de Servicio de Contabilidad para Transportistas -->
    <section class="relative h-[480px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            @if(!empty($settings->accounting_hero_title) || !empty($settings->accounting_hero_subtitle))
                <div class="absolute inset-0 bg-primary/70 z-10"></div>
            @endif
            @if(!empty($settings->accounting_hero_image))
                <div class="w-full h-full bg-cover bg-center brightness-45 hero-image-zoom" style="background-image: url('{{ str_starts_with($settings->accounting_hero_image, 'http') ? $settings->accounting_hero_image : asset('storage/' . $settings->accounting_hero_image) }}')"></div>
            @else
                <div class="w-full h-full bg-cover bg-center brightness-45 hero-image-zoom" style="background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=1200')"></div>
            @endif
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-10">
            <div class="max-w-2xl">
                <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">Área Contable</span>
                <h2 class="font-headline-xl text-headline-xl text-white mb-md">{{ $settings->accounting_hero_title ?? 'Servicios Contables Especializados para Transportistas' }}</h2>
                <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">
                    {{ $settings->accounting_hero_subtitle ?? 'Ofrecemos soporte tributario y financiero integral para conductores y empresas de carga pesada, garantizando tranquilidad y cumplimiento con la SUNAT.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- 5. Sección de Beneficios de Contabilidad -->
    @if ($benefitsAccounting->count() > 0)
        <section class="py-16 bg-surface-container-low border-b border-outline-variant">
            <div class="max-w-[1440px] mx-auto px-margin">
                <div class="text-center mb-12">
                    <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block mb-2">Tranquilidad Fiscal</span>
                    <h2 class="font-headline-lg text-headline-lg text-ocean-deep">Beneficios Contables para el Conductor</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($benefitsAccounting as $benefit)
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm hover:border-transit-blue hover:shadow-md transition-all duration-300 group p-6">
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

    <section class="py-16 border-b border-outline-variant" id="accounting-contact">
        <div class="max-w-[1440px] mx-auto px-margin grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Imagen Lateral Administrable (Relación 1/2, sin cortes ni sombreados, clickable para zoom) -->
            <div class="lg:col-span-6 flex items-center justify-center">
                @if(!empty($settings->accounting_form_image))
                    <img class="w-full h-auto object-contain rounded-sm cursor-pointer hover:opacity-95 hover:scale-[1.01] transition-all" src="{{ str_starts_with($settings->accounting_form_image, 'http') ? $settings->accounting_form_image : asset('storage/' . $settings->accounting_form_image) }}" alt="Soporte Contable" onclick="openLightbox(this.src)">
                @else
                    <img class="w-full h-auto object-contain rounded-sm cursor-pointer hover:opacity-95 hover:scale-[1.01] transition-all" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=600" alt="Soporte Contable" onclick="openLightbox(this.src)">
                @endif
            </div>

            <!-- Formulario de Contabilidad (Relación 1/2) -->
            <div class="lg:col-span-6 bg-surface-container-lowest border border-outline-variant rounded-sm shadow-sm p-8">
                <span class="text-transit-blue font-label-sm text-label-sm uppercase tracking-widest font-semibold block mb-2">Asesoría Tributaria</span>
                <h3 class="font-headline-lg text-headline-lg text-ocean-deep mb-6">Solicitar Soporte Contable</h3>

                @if (session('success_message_accounting'))
                    <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-sm text-sm font-label-bold mb-4" role="alert">
                        {{ session('success_message_accounting') }}
                    </div>
                @endif

                <form action="{{ route('contacto.mensaje') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="type" value="accounting">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Nombre Completo</label>
                            <input name="name" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Juan Pérez" type="text" value="{{ old('name') }}" />
                        </div>
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Empresa / Razón Social</label>
                            <input name="company" class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Ej: Transportes SAC" type="text" value="{{ old('company') }}" />
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Correo Electrónico</label>
                            <input name="email" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="usuario@empresa.com" type="email" value="{{ old('email') }}" />
                        </div>
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-label-bold text-on-surface">Teléfono / Celular</label>
                            <input name="phone" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Ej: +51 987654321" type="tel" value="{{ old('phone') }}" />
                        </div>
                    </div>

                    <div class="space-y-[2px]">
                        <label class="font-label-bold text-label-bold text-on-surface">Consulta Contable</label>
                        <textarea name="message" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Indique sus dudas sobre detracciones, regímenes tributarios, declaraciones..." rows="4">{{ old('message') }}</textarea>
                    </div>
                    
                    <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3 rounded-sm hover:bg-transit-blue/90 transition-colors" type="submit">Enviar Solicitud Contable</button>
                </form>
            </div>
        </div>
    </section>

    <!-- 7. Sección de Convocatoria (Trabaja con Nosotros) -->
    <section class="py-16 bg-ocean-deep text-white" id="join-fleet">
        <div class="max-w-[1440px] mx-auto px-margin">
            <div class="flex flex-col lg:flex-row gap-8 items-center">

                <div class="lg:w-1/2 space-y-6">
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

                <div class="lg:w-1/2 w-full text-on-surface">
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-sm shadow-lg p-8 bg-white">
                        @if (session('success_postulacion'))
                            <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-sm text-sm font-label-bold mb-4" role="alert">
                                {{ session('success_postulacion') }}
                            </div>
                        @endif

                        <form action="{{ route('contacto.postulacion') }}" method="POST" class="space-y-4">
                            @csrf
                            <p class="font-label-bold text-label-bold text-ocean-deep border-l-2 border-transit-blue pl-2 font-semibold">
                                Datos Personales
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input name="driver_name" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Nombre completo" type="text" value="{{ old('driver_name') }}" />
                                <input name="phone" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Teléfono / WhatsApp" type="tel" value="{{ old('phone') }}" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <select name="document_type" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm border-0 border-b-2">
                                    <option value="">Tipo de Documento</option>
                                    <option value="DNI" {{ old('document_type') === 'DNI' ? 'selected' : '' }}>DNI (Documento Nacional de Identidad)</option>
                                    <option value="RUC" {{ old('document_type') === 'RUC' ? 'selected' : '' }}>RUC (Registro Único de Contribuyentes)</option>
                                    <option value="CE" {{ old('document_type') === 'CE' ? 'selected' : '' }}>Carnet de Extranjería</option>
                                </select>
                                <input name="document_number" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Número de Documento / RUC" type="text" value="{{ old('document_number') }}" />
                            </div>

                            <p class="font-label-bold text-label-bold text-ocean-deep border-l-2 border-transit-blue pl-2 font-semibold pt-4">
                                Especificaciones Vehiculares
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <select name="vehicle_type" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm border-0 border-b-2">
                                    <option value="">Tipo de Vehículo</option>
                                    <option {{ old('vehicle_type') === 'Furgón' ? 'selected' : '' }}>Furgón</option>
                                    <option {{ old('vehicle_type') === 'Plataforma' ? 'selected' : '' }}>Plataforma</option>
                                    <option {{ old('vehicle_type') === 'Cisternas' ? 'selected' : '' }}>Cisternas</option>
                                    <option {{ old('vehicle_type') === 'Cama Baja' ? 'selected' : '' }}>Cama Baja</option>
                                </select>
                                <input name="vehicle_plate" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Placa del Vehículo" type="text" value="{{ old('vehicle_plate') }}" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input name="license_number" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Licencia de Conducir" type="text" value="{{ old('license_number') }}" />
                                <input name="vehicle_year" required class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Año del Vehículo" type="text" value="{{ old('vehicle_year') }}" />
                            </div>
                            
                            <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3 rounded-sm hover:bg-transit-blue/90 transition-colors mt-4 uppercase tracking-wider font-semibold text-xs" type="submit">Enviar Postulación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Mapa e Iframe -->
    <section class="py-16">
        <div class="max-w-[1440px] mx-auto px-margin">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <div class="lg:col-span-8 h-[400px] border border-outline-variant rounded-sm overflow-hidden shadow-sm">
                    @if (!empty($settings->map_iframe_url))
                        <iframe src="{{ $settings->map_iframe_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full grayscale hover:grayscale-0 transition-all duration-700"></iframe>
                    @else
                        <div class="w-full h-full flex items-center justify-center text-on-surface-variant bg-surface-container">
                            Mapa de ubicación no disponible.
                        </div>
                    @endif
                </div>

                <div class="lg:col-span-4 flex flex-col justify-between gap-4">
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
                            @if (!empty($settings->whatsapp_number))
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

    <!-- Lightbox Modal para Detalle de Imagen -->
    <div id="image-lightbox" class="fixed inset-0 bg-black/85 z-[300] hidden items-center justify-center p-4 backdrop-blur-sm opacity-0 transition-opacity duration-300 ease-in-out" onclick="closeLightbox()">
        <button class="absolute top-5 right-5 text-white/80 hover:text-white transition-colors" onclick="closeLightbox(event)">
            <span class="material-symbols-outlined text-4xl">close</span>
        </button>
        <img id="lightbox-img" class="max-w-full max-h-[90vh] object-contain rounded-sm transform scale-95 transition-transform duration-300 ease-in-out" src="" alt="Vista Detallada" onclick="event.stopPropagation()">
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
