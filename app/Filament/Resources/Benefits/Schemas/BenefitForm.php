<?php

namespace App\Filament\Resources\Benefits\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BenefitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detalle del Beneficio')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título del Beneficio')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('icon')
                            ->label('Icono (Material Symbol, ej: payments, local_gas_station, account_balance)')
                            ->required()
                            ->default('payments'),
                        Select::make('type')
                            ->label('Tipo de Beneficio')
                            ->options([
                                'general' => 'General / Transportista',
                                'accounting' => 'Contabilidad de Transportista',
                            ])
                            ->required()
                            ->default('general'),
                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        TextInput::make('sort_order')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
