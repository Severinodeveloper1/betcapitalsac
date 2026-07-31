@extends('layouts.app')

@section('title', 'Libro de Reclamaciones | BET CAPITAL SAC')

@section('content')
    <!-- Banner Principal (Libro de Reclamaciones) con corte diagonal -->
    <section class="relative h-[320px] flex items-center overflow-hidden bg-primary hero-diagonal">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-primary/60 z-10"></div>
            <div class="w-full h-full bg-cover bg-center brightness-50" style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=1200')"></div>
        </div>
        <div class="relative z-20 w-full max-w-[1440px] mx-auto px-margin text-white -mt-6">
            <span class="text-electric-cyan font-label-sm text-label-sm uppercase tracking-widest block mb-2 font-semibold">INDECOPI</span>
            <h1 class="font-headline-xl text-headline-xl text-white">Libro de Reclamaciones Virtual</h1>
            <p class="font-body-lg text-body-lg text-primary-fixed opacity-95">De conformidad con lo dispuesto en el Código de Protección y Defensa del Consumidor (Ley N° 29571).</p>
        </div>
    </section>

    <!-- Formulario del Libro de Reclamaciones -->
    <section class="py-16 bg-surface-bright">
        <div class="max-w-[1000px] mx-auto px-margin">
            
            <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-sm shadow-sm">
                
                @if (session('success_claim'))
                    <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-sm text-sm font-label-bold mb-6" role="alert">
                        <div class="flex items-start gap-2">
                            <span class="material-symbols-outlined text-green-700">check_circle</span>
                            <div>
                                <h4 class="font-bold text-base mb-1">¡Reclamo Registrado Exitosamente!</h4>
                                <p class="font-normal">{{ session('success_claim') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form id="claims-form" action="{{ route('reclamos.submit') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- 1. Identificación del Consumidor Reclamante -->
                    <div class="space-y-4">
                        <h3 class="font-label-bold text-label-bold text-ocean-deep border-l-4 border-transit-blue pl-2 font-bold uppercase tracking-wider text-sm">
                            1. Identificación del Consumidor Reclamante
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-fullname">Nombre Completo o Razón Social</label>
                                <input id="claims-fullname" name="fullname" required class="w-full p-2.5 bg-surface-gray border @error('fullname') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Juan Pérez" type="text" value="{{ old('fullname') }}" />
                                @error('fullname')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-parent-name">Nombre del Padre o Madre (si es menor de edad)</label>
                                <input id="claims-parent-name" name="parent_name" class="w-full p-2.5 bg-surface-gray border border-outline-variant focus:border-transit-blue focus:outline-none transition-all text-sm rounded-sm" placeholder="Nombre de apoderado" type="text" value="{{ old('parent_name') }}" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-doc-type">Tipo de Documento</label>
                                <select id="claims-doc-type" name="document_type" required class="w-full p-2.5 bg-surface-gray border @error('document_type') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm">
                                    <option value="">Seleccione...</option>
                                    <option value="DNI" {{ old('document_type') === 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="RUC" {{ old('document_type') === 'RUC' ? 'selected' : '' }}>RUC</option>
                                    <option value="CE" {{ old('document_type') === 'CE' ? 'selected' : '' }}>Carnet de Extranjería</option>
                                    <option value="PASAPORTE" {{ old('document_type') === 'PASAPORTE' ? 'selected' : '' }}>Pasaporte</option>
                                </select>
                                @error('document_type')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px] sm:col-span-2">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-doc-number">Número de Documento</label>
                                <input id="claims-doc-number" name="document_number" required class="w-full p-2.5 bg-surface-gray border @error('document_number') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: 12345678" type="text" value="{{ old('document_number') }}" />
                                @error('document_number')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-phone">Teléfono / Celular</label>
                                <input id="claims-phone" name="phone" required class="w-full p-2.5 bg-surface-gray border @error('phone') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: +51 987654321" type="tel" value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-email">Correo Electrónico</label>
                                <input id="claims-email" name="email" required class="w-full p-2.5 bg-surface-gray border @error('email') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="usuario@correo.com" type="email" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-xs text-on-surface" for="claims-address">Domicilio (Dirección Completa)</label>
                            <input id="claims-address" name="address" required class="w-full p-2.5 bg-surface-gray border @error('address') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Av. Principal 123 Dpto. 402" type="text" value="{{ old('address') }}" />
                            @error('address')
                                <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-department">Departamento</label>
                                <input id="claims-department" name="department" required class="w-full p-2.5 bg-surface-gray border @error('department') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Lima" type="text" value="{{ old('department') }}" />
                                @error('department')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-province">Provincia</label>
                                <input id="claims-province" name="province" required class="w-full p-2.5 bg-surface-gray border @error('province') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Lima" type="text" value="{{ old('province') }}" />
                                @error('province')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-district">Distrito</label>
                                <input id="claims-district" name="district" required class="w-full p-2.5 bg-surface-gray border @error('district') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Callao" type="text" value="{{ old('district') }}" />
                                @error('district')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- 2. Identificación del Bien Contratado -->
                    <div class="space-y-4 pt-4 border-t border-outline-variant/30">
                        <h3 class="font-label-bold text-label-bold text-ocean-deep border-l-4 border-transit-blue pl-2 font-bold uppercase tracking-wider text-sm">
                            2. Identificación del Bien Contratado
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="space-y-[2px]">
                                <label class="font-label-bold text-xs text-on-surface">Tipo de Bien</label>
                                <div class="flex items-center gap-4 pt-2">
                                    <label class="inline-flex items-center gap-2 text-sm text-on-surface cursor-pointer">
                                        <input type="radio" name="item_type" value="producto" {{ old('item_type') === 'producto' ? 'checked' : '' }} required class="text-transit-blue focus:ring-transit-blue cursor-pointer">
                                        Producto
                                    </label>
                                    <label class="inline-flex items-center gap-2 text-sm text-on-surface cursor-pointer">
                                        <input type="radio" name="item_type" value="servicio" {{ old('item_type', 'servicio') === 'servicio' ? 'checked' : '' }} required class="text-transit-blue focus:ring-transit-blue cursor-pointer">
                                        Servicio
                                    </label>
                                </div>
                                @error('item_type')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-y-[2px] sm:col-span-2">
                                <label class="font-label-bold text-xs text-on-surface" for="claims-item-amount">Monto Reclamado (S/ - Opcional)</label>
                                <input id="claims-item-amount" name="item_amount" class="w-full p-2.5 bg-surface-gray border @error('item_amount') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: 1500.00" type="number" step="0.01" min="0" value="{{ old('item_amount') }}" />
                                @error('item_amount')
                                    <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-xs text-on-surface" for="claims-item-description">Descripción del Producto o Servicio Contratado</label>
                            <textarea id="claims-item-description" name="item_description" required class="w-full p-2.5 bg-surface-gray border @error('item_description') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Ej: Servicio de flete local Callao..." rows="2">{{ old('item_description') }}</textarea>
                            @error('item_description')
                                <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- 3. Detalle de la Reclamación y Pedido del Consumidor -->
                    <div class="space-y-4 pt-4 border-t border-outline-variant/30">
                        <h3 class="font-label-bold text-label-bold text-ocean-deep border-l-4 border-transit-blue pl-2 font-bold uppercase tracking-wider text-sm">
                            3. Detalle de la Reclamación y Pedido
                        </h3>
                        
                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-xs text-on-surface">Acción Solicitada</label>
                            <div class="flex items-start gap-6 pt-2">
                                <label class="inline-flex items-start gap-2 text-sm text-on-surface cursor-pointer">
                                    <input type="radio" name="claim_type" value="reclamacion" {{ old('claim_type', 'reclamacion') === 'reclamacion' ? 'checked' : '' }} required class="text-transit-blue focus:ring-transit-blue mt-0.5 cursor-pointer">
                                    <div>
                                        <span class="font-bold block text-ocean-deep">Reclamación</span>
                                        <span class="text-xs text-on-surface-variant/80">Disconformidad relacionada a los productos o servicios brindados.</span>
                                    </div>
                                </label>
                                <label class="inline-flex items-start gap-2 text-sm text-on-surface cursor-pointer">
                                    <input type="radio" name="claim_type" value="queja" {{ old('claim_type') === 'queja' ? 'checked' : '' }} required class="text-transit-blue focus:ring-transit-blue mt-0.5 cursor-pointer">
                                    <div>
                                        <span class="font-bold block text-ocean-deep">Queja</span>
                                        <span class="text-xs text-on-surface-variant/80">Descontento o malestar respecto a la atención o factores no vinculados directamente al servicio.</span>
                                    </div>
                                </label>
                            </div>
                            @error('claim_type')
                                <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-xs text-on-surface" for="claims-claim-details">Detalle de la Reclamación o Queja</label>
                            <textarea id="claims-claim-details" name="claim_details" required class="w-full p-2.5 bg-surface-gray border @error('claim_details') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Detalle con claridad lo sucedido..." rows="4">{{ old('claim_details') }}</textarea>
                            @error('claim_details')
                                <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-[2px]">
                            <label class="font-label-bold text-xs text-on-surface" for="claims-consumer-request">Pedido o Solución Solicitada por el Consumidor</label>
                            <textarea id="claims-consumer-request" name="consumer_request" required class="w-full p-2.5 bg-surface-gray border @error('consumer_request') border-red-500 focus:border-red-500 @else border-outline-variant @enderror transition-all text-sm rounded-sm" placeholder="Indique la solución que solicita..." rows="3">{{ old('consumer_request') }}</textarea>
                            @error('consumer_request')
                                <span class="text-red-500 text-xs mt-1 block font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Envío -->
                    <div class="pt-4 border-t border-outline-variant/30">
                        <button class="shimmer-btn w-full bg-transit-blue text-white font-label-bold text-label-bold py-3.5 rounded-sm hover:bg-transit-blue/90 transition-colors uppercase tracking-wider font-semibold" type="submit">
                            Enviar Reclamación
                        </button>
                        <p class="text-xs text-on-surface-variant/80 text-center mt-3">
                            * Al enviar, se generará una constancia digital en formato PDF de su reclamación y se enviará una copia a su correo electrónico.
                        </p>
                    </div>

                </form>
            </div>
            
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Validar teléfonos en tiempo real (solo permitir dígitos, espacios, guiones, más y paréntesis)
            const phoneInput = document.getElementById('claims-phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function() {
                    const originalVal = this.value;
                    const cleanedVal = originalVal.replace(/[^0-9\s\-+()]/g, '');
                    if (originalVal !== cleanedVal) {
                        this.value = cleanedVal;
                    }
                });
            }

            // 2. Formatear y validar campos de documento condicionalmente
            const selectEl = document.getElementById('claims-doc-type');
            const numberInputEl = document.getElementById('claims-doc-number');

            if (selectEl && numberInputEl) {
                function updateRules(clearInput = true) {
                    const docType = selectEl.value;
                    if (clearInput) {
                        numberInputEl.value = ''; 
                    }

                    if (docType === 'DNI') {
                        numberInputEl.setAttribute('maxlength', '8');
                        numberInputEl.setAttribute('placeholder', '8 dígitos (Solo números)');
                        numberInputEl.setAttribute('inputmode', 'numeric');
                        numberInputEl.setAttribute('pattern', '[0-9]{8}');
                    } else if (docType === 'RUC') {
                        numberInputEl.setAttribute('maxlength', '11');
                        numberInputEl.setAttribute('placeholder', '11 dígitos (Empieza con 10, 15, 17, 20)');
                        numberInputEl.setAttribute('inputmode', 'numeric');
                        numberInputEl.setAttribute('pattern', '[0-9]{11}');
                    } else if (docType === 'CE') {
                        numberInputEl.setAttribute('maxlength', '12');
                        numberInputEl.setAttribute('placeholder', '8 a 12 caracteres (Alfanumérico)');
                        numberInputEl.removeAttribute('inputmode');
                        numberInputEl.removeAttribute('pattern');
                    } else if (docType === 'PASAPORTE') {
                        numberInputEl.setAttribute('maxlength', '12');
                        numberInputEl.setAttribute('placeholder', '6 a 12 caracteres (Alfanumérico)');
                        numberInputEl.removeAttribute('inputmode');
                        numberInputEl.removeAttribute('pattern');
                    } else {
                        numberInputEl.setAttribute('maxlength', '20');
                        numberInputEl.setAttribute('placeholder', 'Número de Documento');
                        numberInputEl.removeAttribute('inputmode');
                        numberInputEl.removeAttribute('pattern');
                    }
                }

                selectEl.addEventListener('change', function() {
                    updateRules(true);
                });
                
                numberInputEl.addEventListener('input', function() {
                    const docType = selectEl.value;
                    if (docType === 'DNI' || docType === 'RUC') {
                        // Solo dígitos
                        this.value = this.value.replace(/[^0-9]/g, '');
                    } else {
                        // Alfanumérico
                        this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
                    }
                });

                // Si ya tiene un valor inicial (por ejemplo por redirect old), aplicar reglas sin borrar
                if (selectEl.value) {
                    updateRules(false);
                }
            }
        });
    </script>
@endsection
