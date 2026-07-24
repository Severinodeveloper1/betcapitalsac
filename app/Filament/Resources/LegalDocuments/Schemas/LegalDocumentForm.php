<?php

namespace App\Filament\Resources\LegalDocuments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class LegalDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Documento Legal')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título de la Cláusula/Sección')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),
                        TextInput::make('slug')
                            ->label('Identificador (Slug)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Select::make('type')
                            ->label('Tipo de Documento')
                            ->options([
                                'terms' => 'Términos de Servicio',
                                'privacy' => 'Política de Privacidad',
                            ])
                            ->required()
                            ->default('terms'),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                        Textarea::make('content')
                            ->label('Contenido')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
