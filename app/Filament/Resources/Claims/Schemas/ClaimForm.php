<?php

namespace App\Filament\Resources\Claims\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClaimForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Reclamo / Queja')
                    ->schema([
                        TextInput::make('claim_number')
                            ->label('Número de Reclamación')
                            ->disabled(),
                        Select::make('claim_type')
                            ->label('Tipo')
                            ->options([
                                'reclamacion' => 'Reclamación',
                                'queja' => 'Queja',
                            ])
                            ->disabled(),
                        TextInput::make('fullname')
                            ->label('Nombre del Consumidor')
                            ->disabled(),
                        TextInput::make('document_type')
                            ->label('Tipo de Documento')
                            ->disabled(),
                        TextInput::make('document_number')
                            ->label('Número de Documento')
                            ->disabled(),
                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->disabled(),
                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->disabled(),
                        TextInput::make('parent_name')
                            ->label('Apoderado (Si aplica)')
                            ->disabled(),
                    ])
                    ->columns(3),

                Section::make('Dirección / Domicilio')
                    ->schema([
                        TextInput::make('address')
                            ->label('Dirección')
                            ->disabled(),
                        TextInput::make('department')
                            ->label('Departamento')
                            ->disabled(),
                        TextInput::make('province')
                            ->label('Provincia')
                            ->disabled(),
                        TextInput::make('district')
                            ->label('Distrito')
                            ->disabled(),
                    ])
                    ->columns(4),

                Section::make('Identificación del Bien Contratado')
                    ->schema([
                        Select::make('item_type')
                            ->label('Tipo de Bien')
                            ->options([
                                'producto' => 'Producto',
                                'servicio' => 'Servicio',
                            ])
                            ->disabled(),
                        TextInput::make('item_amount')
                            ->label('Monto Reclamado (S/)')
                            ->disabled(),
                        Textarea::make('item_description')
                            ->label('Descripción del Bien Contratado')
                            ->disabled()
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Detalle del Reclamo')
                    ->schema([
                        Textarea::make('claim_details')
                            ->label('Detalle del Reclamo/Queja')
                            ->disabled()
                            ->rows(4)
                            ->columnSpanFull(),
                        Textarea::make('consumer_request')
                            ->label('Pedido del Consumidor')
                            ->disabled()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gestión y Respuesta de la Empresa')
                    ->schema([
                        Select::make('status')
                            ->label('Estado de Gestión')
                            ->options([
                                'pending' => 'Pendiente',
                                'in_progress' => 'En Proceso',
                                'resolved' => 'Resuelto (Enviado al Cliente)',
                            ])
                            ->required(),
                        DatePicker::make('response_date')
                            ->label('Fecha de Respuesta')
                            ->default(now()),
                        Textarea::make('provider_response')
                            ->label('Detalle de Respuesta al Reclamante')
                            ->placeholder('Ingrese la respuesta formal de la empresa que se le notificará al consumidor...')
                            ->rows(6)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ])->columns(1);
    }
}
