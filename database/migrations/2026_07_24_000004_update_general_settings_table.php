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
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('accounting_hero_title')->nullable()->after('seo_description');
            $table->text('accounting_hero_subtitle')->nullable()->after('accounting_hero_title');
            $table->string('accounting_hero_image')->nullable()->after('accounting_hero_subtitle');
            $table->string('accounting_form_image')->nullable()->after('accounting_hero_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn([
                'accounting_hero_title',
                'accounting_hero_subtitle',
                'accounting_hero_image',
                'accounting_form_image'
            ]);
        });
    }
};
