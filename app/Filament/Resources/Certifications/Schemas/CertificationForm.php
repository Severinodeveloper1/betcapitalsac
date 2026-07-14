<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Certificado')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título de Certificación')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('validity')
                            ->label('Vigencia (ej: Vigencia: 2024 - 2025)')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->label('Descripción / Detalle')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1),

                Section::make('Archivos y Orden')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Imagen Vista Previa (Documento)')
                            ->image()
                            ->directory('certifications')
                            ->required(),
                        FileUpload::make('pdf_file')
                            ->label('Documento PDF Oficial')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('certifications/pdfs')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),
            ])->columns(1);
    }
}
