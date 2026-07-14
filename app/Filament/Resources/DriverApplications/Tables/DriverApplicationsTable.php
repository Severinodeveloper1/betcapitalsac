<?php

namespace App\Filament\Resources\DriverApplications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DriverApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('driver_name')
                    ->label('Transportista')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable(),
                TextColumn::make('vehicle_type')
                    ->label('Vehículo')
                    ->sortable(),
                TextColumn::make('vehicle_plate')
                    ->label('Placa')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'under_review' => 'info',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'primary',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Fecha Postulación')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pending' => 'Pendiente',
                        'under_review' => 'En Evaluación',
                        'approved' => 'Aprobado',
                        'rejected' => 'Rechazado',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
