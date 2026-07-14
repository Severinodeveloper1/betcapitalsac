<?php

namespace App\Filament\Resources\FleetVehicles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FleetVehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Vehículo')
                    ->schema([
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->label('Categoría'),
                        TextInput::make('name')
                            ->label('Nombre del Vehículo (Modelo)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->label('Slug Identificador')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('badge')
                            ->label('Distintivo (ej: ALTA CAPACIDAD, URBANO)')
                            ->placeholder('Etiqueta destacada en tarjeta')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Especificaciones Técnicas')
                    ->schema([
                        TextInput::make('capacity')
                            ->label('Capacidad de Carga (ej: 32 TN)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('dimensions')
                            ->label('Dimensiones de Unidad (ej: 13.6m L x 2.6m A)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('load_type')
                            ->label('Tipo de Carga Permitida')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('gps_status')
                            ->label('Estado de Rastreo GPS')
                            ->required()
                            ->default('Activo')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Archivos y Visualización')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Fotografía de la Unidad')
                            ->image()
                            ->disk("public")
                            ->directory('fleet')
                            ->required(),
                        FileUpload::make('brochure')
                            ->label('Ficha Técnica / Brochure (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->directory('brochures'),
                        Toggle::make('is_featured')
                            ->label('Destacado en Página Principal')
                            ->default(false),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
