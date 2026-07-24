<?php

namespace App\Filament\Resources\CompanyDocuments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CompanyDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Documento')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título del Documento')
                            ->required()
                            ->maxLength(255),
                        Select::make('category')
                            ->label('Categoría')
                            ->options([
                                'capacitacion' => 'Capacitaciones',
                                'legal' => 'Documentos Legales',
                                'general' => 'General / Otros',
                            ])
                            ->required()
                            ->default('general'),
                        FileUpload::make('file_path')
                            ->label('Archivo / Documento')
                            ->required()
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'image/*'])
                            ->maxSize(100240) // 100MB
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Descripción / Observaciones (Opcional)')
                            ->rows(3)
                            ->columnSpanFull(),
                        Toggle::make('is_active')
                            ->label('¿Activo / Publicado?')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->label('Orden de visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
