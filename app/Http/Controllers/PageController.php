<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Page;
use App\Models\FleetCategory;
use App\Models\FleetVehicle;
use App\Models\Service;
use App\Models\Project;
use App\Models\Certification;
use App\Models\Partner;
use App\Models\Benefit;
use App\Models\ContactMessage;
use App\Models\DriverApplication;
use App\Models\Claim;
use App\Models\LegalDocument;
use App\Models\CompanyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use App\Mail\DriverApplicationMail;
use App\Mail\ClaimMail;

class PageController extends Controller
{
    protected function getSettings()
    {
        return GeneralSetting::first() ?? new GeneralSetting([
            'office_address' => 'Av. Elmer Faucett 1234, Callao, Perú',
            'email' => 'contacto@betcapitalsac.com',
            'phone' => '+51 1 456 7890',
            'whatsapp_number' => '+51 912345678',
            'office_hours' => 'Lunes - Viernes: 8:00 AM - 6:00 PM | Sábados: 9:00 AM - 1:00 PM',
        ]);
    }

    public function inicio()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'inicio')->first();
        $services = Service::orderBy('sort_order')->get();
        $partners = Partner::orderBy('sort_order')->get();

        return view('pages.inicio', compact('settings', 'page', 'services', 'partners'));
    }

    public function nosotros()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'nosotros')->first();

        return view('pages.nosotros', compact('settings', 'page'));
    }

    public function servicios()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'servicios')->first();
        $services = Service::orderBy('sort_order')->get();

        return view('pages.servicios', compact('settings', 'page', 'services'));
    }

    public function flota(Request $request)
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'flota')->first();
        $categories = FleetCategory::where('is_active', true)->orderBy('id')->get();
        
        $query = FleetVehicle::query();
        if ($request->filled('categoria')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->categoria);
            });
        }
        $vehicles = $query->orderBy('sort_order')->get();

        return view('pages.flota', compact('settings', 'page', 'categories', 'vehicles'));
    }

    public function certificaciones()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'certificaciones')->first();
        $certifications = Certification::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();

        return view('pages.certificaciones', compact('settings', 'page', 'certifications', 'projects'));
    }

    public function contacto()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'contacto')->first();
        $benefitsGeneral = Benefit::where('type', 'general')->orderBy('sort_order')->get();
        $benefitsAccounting = Benefit::where('type', 'accounting')->orderBy('sort_order')->get();

        return view('pages.contacto', compact('settings', 'page', 'benefitsGeneral', 'benefitsAccounting'));
    }

    public function submitMensaje(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
            'message' => 'required|string',
            'type' => 'required|in:general,accounting',
        ], [
            'phone.regex' => 'El teléfono debe contener entre 7 y 15 dígitos y solo puede incluir números, espacios, guiones y paréntesis.',
            'email.email' => 'Ingrese una dirección de correo electrónico válida.',
            'name.required' => 'El nombre completo es requerido.',
            'message.required' => 'El mensaje o requerimiento es requerido.',
        ]);

        $message = ContactMessage::create($validated);

        try {
            $adminEmail = GeneralSetting::value('email') ?? 'contacto@betcapitalsac.com';
            Mail::to($adminEmail)->send(new ContactMessageMail($message));
        } catch (\Exception $e) {
            logger()->error('Error enviando correo de contacto: ' . $e->getMessage());
        }

        $successKey = $validated['type'] === 'accounting' ? 'success_message_accounting' : 'success_message';
        return back()->with($successKey, 'Su mensaje ha sido enviado con éxito. Nos pondremos en contacto pronto.');
    }

    public function submitPostulacion(Request $request)
    {
        $validated = $request->validate([
            'driver_name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
            'document_type' => 'required|in:DNI,RUC,CE',
            'document_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $type = $request->input('document_type');
                    if ($type === 'DNI') {
                        if (!preg_match('/^\d{8}$/', $value)) {
                            $fail('El DNI debe tener exactamente 8 dígitos numéricos.');
                        }
                    } elseif ($type === 'RUC') {
                        if (!preg_match('/^(10|15|17|20)\d{9}$/', $value) || strlen($value) !== 11) {
                            $fail('El RUC debe comenzar con 10, 15, 17 o 20 y tener exactamente 11 dígitos numéricos.');
                        }
                    } elseif ($type === 'CE') {
                        if (!preg_match('/^[a-zA-Z0-9]{8,12}$/', $value)) {
                            $fail('El Carnet de Extranjería debe tener entre 8 y 12 caracteres alfanuméricos.');
                        }
                    }
                }
            ],
            'vehicle_type' => 'required|string|max:255',
            'vehicle_plate' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'vehicle_year' => 'required|string|max:4',
        ], [
            'phone.regex' => 'El teléfono debe contener entre 7 y 15 dígitos y solo puede incluir números, espacios, guiones y paréntesis.',
            'document_type.in' => 'El tipo de documento seleccionado no es válido.',
            'driver_name.required' => 'El nombre completo es requerido.',
            'vehicle_plate.required' => 'La placa del vehículo es requerida.',
            'license_number.required' => 'La licencia de conducir es requerida.',
            'vehicle_year.required' => 'El año del vehículo es requerido.',
        ]);

        $application = DriverApplication::create($validated);

        try {
            $adminEmail = GeneralSetting::value('email') ?? 'contacto@betcapitalsac.com';
            Mail::to($adminEmail)->send(new DriverApplicationMail($application));
        } catch (\Exception $e) {
            logger()->error('Error enviando correo de postulación: ' . $e->getMessage());
        }

        return back()->with('success_postulacion', 'Su postulación ha sido enviada exitosamente para evaluación técnica.');
    }

    public function terminos()
    {
        $settings = $this->getSettings();
        $clauses = LegalDocument::where('type', 'terms')->orderBy('sort_order')->get();
        return view('pages.terminos', compact('settings', 'clauses'));
    }

    public function privacidad()
    {
        $settings = $this->getSettings();
        $clauses = LegalDocument::where('type', 'privacy')->orderBy('sort_order')->get();
        return view('pages.privacidad', compact('settings', 'clauses'));
    }

    public function reclamaciones()
    {
        $settings = $this->getSettings();
        return view('pages.reclamos', compact('settings'));
    }

    public function submitReclamacion(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'document_type' => 'required|in:DNI,RUC,CE,PASAPORTE',
            'document_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $type = $request->input('document_type');
                    if ($type === 'DNI') {
                        if (!preg_match('/^\d{8}$/', $value)) {
                            $fail('El DNI debe tener exactamente 8 dígitos numéricos.');
                        }
                    } elseif ($type === 'RUC') {
                        if (!preg_match('/^(10|15|17|20)\d{9}$/', $value) || strlen($value) !== 11) {
                            $fail('El RUC debe comenzar con 10, 15, 17 o 20 y tener exactamente 11 dígitos numéricos.');
                        }
                    } elseif ($type === 'CE') {
                        if (!preg_match('/^[a-zA-Z0-9]{8,12}$/', $value)) {
                            $fail('El Carnet de Extranjería debe tener entre 8 y 12 caracteres alfanuméricos.');
                        }
                    } elseif ($type === 'PASAPORTE') {
                        if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $value)) {
                            $fail('El Pasaporte debe tener entre 6 y 12 caracteres alfanuméricos.');
                        }
                    }
                }
            ],
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
            'email' => 'required|email|max:255',
            'parent_name' => 'nullable|string|max:255',
            'item_type' => 'required|in:producto,servicio',
            'item_description' => 'required|string',
            'item_amount' => 'nullable|numeric|min:0',
            'claim_type' => 'required|in:reclamacion,queja',
            'claim_details' => 'required|string',
            'consumer_request' => 'required|string',
        ], [
            'phone.regex' => 'El teléfono debe contener entre 7 y 15 dígitos y solo puede incluir números, espacios, guiones y paréntesis.',
            'email.email' => 'Ingrese una dirección de correo electrónico válida.',
            'fullname.required' => 'El nombre completo o razón social es requerido.',
            'address.required' => 'El domicilio es requerido.',
            'department.required' => 'El departamento es requerido.',
            'province.required' => 'La provincia es requerida.',
            'district.required' => 'El distrito es requerido.',
            'item_description.required' => 'La descripción del producto o servicio es requerida.',
            'claim_details.required' => 'El detalle del reclamo o queja es requerido.',
            'consumer_request.required' => 'El pedido o solución solicitada es requerido.',
        ]);

        // Generar número correlativo
        $year = now()->year;
        $count = Claim::whereYear('created_at', $year)->count() + 1;
        $validated['claim_number'] = sprintf('RECL-%d-%04d', $year, $count);

        $claim = Claim::create($validated);

        try {
            $adminEmail = GeneralSetting::value('email') ?? 'contacto@betcapitalsac.com';
            Mail::to($adminEmail)->send(new ClaimMail($claim, 'admin'));
            Mail::to($claim->email)->send(new ClaimMail($claim, 'customer'));
        } catch (\Exception $e) {
            logger()->error('Error enviando correos de reclamación: ' . $e->getMessage());
        }

        return redirect()->route('reclamos')->with('success_claim', "Su reclamación ha sido registrada bajo el código: {$claim->claim_number}. De acuerdo a ley, responderemos en un plazo máximo de 15 días hábiles.");
    }

    public function documentacion()
    {
        $settings = $this->getSettings();
        $page = Page::where('slug', 'contacto')->first(); // use contact hero data or default
        $documents = CompanyDocument::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.documentacion', compact('settings', 'page', 'documents'));
    }
}
