<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del Aliado Estratégico')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del Aliado')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('link')
                            ->label('Enlace Web Oficial (Opcional)')
                            ->url()
                            ->maxLength(255),
                        FileUpload::make('logo')
                            ->label('Logo Corporativo (PNG/SVG)')
                            ->image()
                            ->disk('public')
                            ->directory('partners'),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
