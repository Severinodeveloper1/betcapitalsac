<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detalle del Proyecto')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título del Proyecto')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('client_or_project')
                            ->label('Proyecto / Cliente (ej: Operación: Puerto del Callao)')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Descripción Breve')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Multimedia y Ajustes')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Imagen del Proyecto')
                            ->image()
                            ->disk('public')
                            ->directory('projects')
                            ->required(),
                        Toggle::make('is_featured')
                            ->label('Destacado en Portafolio')
                            ->default(false),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),
            ])->columns(1);
    }
}
