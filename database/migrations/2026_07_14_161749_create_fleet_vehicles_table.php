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
        Schema::create('fleet_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('fleet_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();
            $table->string('capacity');
            $table->string('dimensions');
            $table->string('load_type');
            $table->string('gps_status')->default('Activo');
            $table->text('image')->nullable();
            $table->text('brochure')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleet_vehicles');
    }
};
