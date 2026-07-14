<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información Principal')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del Servicio')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->label('Slug Identificador')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Descripción Detallada')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('icon_name')
                            ->label('Icono (Nombre de Material Symbol, ej: local_shipping, circle, account_balance_wallet)')
                            ->required()
                            ->default('local_shipping'),
                    ])
                    ->columns(2),

                Section::make('Multimedia y Archivos')
                    ->schema([
                        FileUpload::make('cover_image')
                            ->label('Imagen de Fondo / Portada')
                            ->image()
                            ->directory('services')
                            ->required(),
                        FileUpload::make('brochure_file')
                            ->label('Ficha Técnica o Brochure (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('brochures'),
                        FileUpload::make('evidence_images')
                            ->label('Galería de Evidencias (Operaciones y Proyectos)')
                            ->multiple()
                            ->maxFiles(4)
                            ->reorderable()
                            ->image()
                            ->directory('services/evidence')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Acción (CTA) y Orden')
                    ->schema([
                        TextInput::make('cta_text')
                            ->label('Texto del Botón (ej: Solicitar Cotización)'),
                        TextInput::make('cta_url')
                            ->label('Enlace del Botón (ej: #contact)'),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),
            ]);
    }
}
