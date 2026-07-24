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
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:general,accounting',
        ]);

        ContactMessage::create($validated);

        $successKey = $validated['type'] === 'accounting' ? 'success_message_accounting' : 'success_message';
        return back()->with($successKey, 'Su mensaje ha sido enviado con éxito. Nos pondremos en contacto pronto.');
    }

    public function submitPostulacion(Request $request)
    {
        $validated = $request->validate([
            'driver_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'document_type' => 'required|string|max:255',
            'document_number' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_plate' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'vehicle_year' => 'required|string|max:4',
        ]);

        DriverApplication::create($validated);

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
            'document_type' => 'required|string|max:255',
            'document_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'parent_name' => 'nullable|string|max:255',
            'item_type' => 'required|in:producto,servicio',
            'item_description' => 'required|string',
            'item_amount' => 'nullable|numeric|min:0',
            'claim_type' => 'required|in:reclamacion,queja',
            'claim_details' => 'required|string',
            'consumer_request' => 'required|string',
        ]);

        // Generar número correlativo
        $year = now()->year;
        $count = Claim::whereYear('created_at', $year)->count() + 1;
        $validated['claim_number'] = sprintf('RECL-%d-%04d', $year, $count);

        $claim = Claim::create($validated);

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
