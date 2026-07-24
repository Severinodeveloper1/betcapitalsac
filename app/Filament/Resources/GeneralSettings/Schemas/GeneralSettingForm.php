<?php

namespace App\Filament\Resources\GeneralSettings\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class GeneralSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('Contacto')
                            ->schema([
                                TextInput::make('office_address')
                                    ->label('Dirección de la Oficina')
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->label('Correo Electrónico')
                                    ->email()
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->label('Teléfono Comercial')
                                    ->maxLength(255),
                                TextInput::make('whatsapp_number')
                                    ->label('Número de WhatsApp')
                                    ->maxLength(255),
                                TextInput::make('office_hours')
                                    ->label('Horario de Atención')
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('Localización (Mapa)')
                            ->schema([
                                Textarea::make('map_iframe_url')
                                    ->label('Código de Embebido Iframe de Google Maps')
                                    ->helperText('Copie el enlace src o el tag iframe completo desde Google Maps.')
                                    ->rows(4),
                            ]),
                        Tabs\Tab::make('SEO & Branding')
                            ->schema([
                                TextInput::make('seo_title')
                                    ->label('Título SEO Global')
                                    ->maxLength(255),
                                Textarea::make('seo_description')
                                    ->label('Descripción SEO Global')
                                    ->rows(3),
                                FileUpload::make('site_logo')
                                    ->label('Logotipo del Sitio')
                                    ->image()
                                    ->disk('public')
                                    ->directory('branding'),
                                FileUpload::make('site_favicon')
                                    ->label('Favicon del Sitio')
                                    ->image()
                                    ->disk('public')
                                    ->directory('branding'),
                            ]),
                        Tabs\Tab::make('Servicio de Contabilidad')
                            ->schema([
                                TextInput::make('accounting_hero_title')
                                    ->label('Título de Banner de Contabilidad')
                                    ->maxLength(255),
                                Textarea::make('accounting_hero_subtitle')
                                    ->label('Subtítulo de Banner de Contabilidad')
                                    ->rows(3),
                                FileUpload::make('accounting_hero_image')
                                    ->label('Imagen de Fondo de Banner')
                                    ->image()
                                    ->disk('public')
                                    ->directory('branding'),
                                FileUpload::make('accounting_form_image')
                                    ->label('Imagen al Costado del Formulario')
                                    ->image()
                                    ->disk('public')
                                    ->directory('branding'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])->columns(1);
    }
}
