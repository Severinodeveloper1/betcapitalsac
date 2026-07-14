<?php

namespace App\Filament\Resources\DriverApplications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DriverApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del Postulante')
                    ->schema([
                        TextInput::make('driver_name')
                            ->label('Nombre del Transportista')
                            ->disabled(),
                        TextInput::make('phone')
                            ->label('Teléfono / WhatsApp')
                            ->disabled(),
                        TextInput::make('license_number')
                            ->label('Número de Licencia')
                            ->disabled(),
                    ])
                    ->columns(3),

                Section::make('Datos del Vehículo')
                    ->schema([
                        TextInput::make('vehicle_type')
                            ->label('Tipo de Vehículo')
                            ->disabled(),
                        TextInput::make('vehicle_plate')
                            ->label('Placa del Vehículo')
                            ->disabled(),
                        TextInput::make('vehicle_year')
                            ->label('Año del Vehículo')
                            ->disabled(),
                    ])
                    ->columns(3),

                Section::make('Evaluación y Decisión Interna')
                    ->schema([
                        Select::make('status')
                            ->label('Estado de la Solicitud')
                            ->options([
                                'pending' => 'Pendiente de Evaluación',
                                'under_review' => 'En Evaluación / Entrevista',
                                'approved' => 'Aprobado (Apto)',
                                'rejected' => 'Rechazado (No Apto)',
                            ])
                            ->required()
                            ->default('pending'),
                        Textarea::make('notes')
                            ->label('Notas de Evaluación / Comentarios')
                            ->placeholder('Describa el resultado de la revisión de documentos o entrevistas...')
                            ->rows(4),
                    ])
                    ->columns(1),
            ])->columns(1);
    }
}
