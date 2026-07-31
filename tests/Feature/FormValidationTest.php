<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_contact_message_phone_validation(): void
    {
        // Invalid phone number (letters)
        $response = $this->post(route('contacto.mensaje'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '98765432a', // has 'a'
            'message' => 'Hello World',
            'type' => 'general',
        ]);
        $response->assertSessionHasErrors('phone');

        // Valid phone number
        $response2 = $this->post(route('contacto.mensaje'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+51 987654321', // valid
            'message' => 'Hello World',
            'type' => 'general',
        ]);
        $response2->assertSessionHasNoErrors();
    }

    public function test_driver_application_document_validation(): void
    {
        // Invalid DNI (too short)
        $response = $this->post(route('contacto.postulacion'), [
            'driver_name' => 'John Driver',
            'phone' => '987654321',
            'document_type' => 'DNI',
            'document_number' => '1234567', // 7 digits
            'vehicle_type' => 'Furgón',
            'vehicle_plate' => 'ABC-123',
            'license_number' => 'Q1234567',
            'vehicle_year' => '2020',
        ]);
        $response->assertSessionHasErrors('document_number');

        // Invalid RUC (starts with 30)
        $response2 = $this->post(route('contacto.postulacion'), [
            'driver_name' => 'John Driver',
            'phone' => '987654321',
            'document_type' => 'RUC',
            'document_number' => '30123456789', // starts with 30
            'vehicle_type' => 'Furgón',
            'vehicle_plate' => 'ABC-123',
            'license_number' => 'Q1234567',
            'vehicle_year' => '2020',
        ]);
        $response2->assertSessionHasErrors('document_number');

        // Valid CE (alfanumerico 8-12)
        $response3 = $this->post(route('contacto.postulacion'), [
            'driver_name' => 'John Driver',
            'phone' => '987654321',
            'document_type' => 'CE',
            'document_number' => 'CE123456A', // 9 characters
            'vehicle_type' => 'Furgón',
            'vehicle_plate' => 'ABC-123',
            'license_number' => 'Q1234567',
            'vehicle_year' => '2020',
        ]);
        $response3->assertSessionHasNoErrors();
    }
}
