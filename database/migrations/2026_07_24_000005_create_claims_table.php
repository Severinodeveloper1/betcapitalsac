<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            // Correlativo auto-generado (ej: RECL-2026-0001)
            $table->string('claim_number')->unique();
            
            // Datos del Reclamante
            $table->string('fullname');
            $table->string('document_type'); // DNI, RUC, CE, etc.
            $table->string('document_number');
            $table->string('address');
            $table->string('department');
            $table->string('province');
            $table->string('district');
            $table->string('phone');
            $table->string('email');
            
            // Si es menor de edad, datos del representante
            $table->string('parent_name')->nullable();
            
            // Identificación del Bien Contratado
            $table->string('item_type'); // Producto / Servicio
            $table->text('item_description');
            $table->decimal('item_amount', 10, 2)->nullable();
            
            // Detalle de la Reclamación
            $table->string('claim_type'); // Reclamacion / Queja
            $table->text('claim_details');
            $table->text('consumer_request'); // Pedido del consumidor
            
            // Estado y Seguimiento
            $table->string('status')->default('pending'); // pending, in_progress, resolved
            $table->text('provider_response')->nullable(); // Respuesta del proveedor
            $table->date('response_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
