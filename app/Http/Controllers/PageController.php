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
        $services = Service::orderBy('sort_order')->get();

        return view('pages.servicios', compact('settings', 'services'));
    }

    public function flota(Request $request)
    {
        $settings = $this->getSettings();
        $categories = FleetCategory::where('is_active', true)->orderBy('id')->get();
        
        $query = FleetVehicle::query();
        if ($request->filled('categoria')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->categoria);
            });
        }
        $vehicles = $query->orderBy('sort_order')->get();

        return view('pages.flota', compact('settings', 'categories', 'vehicles'));
    }

    public function certificaciones()
    {
        $settings = $this->getSettings();
        $certifications = Certification::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();

        return view('pages.certificaciones', compact('settings', 'certifications', 'projects'));
    }

    public function contacto()
    {
        $settings = $this->getSettings();
        $benefits = Benefit::orderBy('sort_order')->get();

        return view('pages.contacto', compact('settings', 'benefits'));
    }

    public function submitMensaje(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success_message', 'Su mensaje ha sido enviado con éxito. Nos pondremos en contacto pronto.');
    }

    public function submitPostulacion(Request $request)
    {
        $validated = $request->validate([
            'driver_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_plate' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'vehicle_year' => 'required|string|max:4',
        ]);

        DriverApplication::create($validated);

        return back()->with('success_postulacion', 'Su postulación ha sido enviada exitosamente para evaluación técnica.');
    }
}
