<?php

namespace App\Filament\Resources\Claims\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ClaimsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('claim_number')
                    ->label('Nro Reclamo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('fullname')
                    ->label('Consumidor')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('claim_type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'reclamacion' => 'danger',
                        'queja' => 'warning',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'reclamacion' => 'Reclamación',
                        'queja' => 'Queja',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('item_type')
                    ->label('Bien')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'producto' => 'Producto',
                        'servicio' => 'Servicio',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'in_progress' => 'warning',
                        'resolved' => 'success',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Proceso',
                        'resolved' => 'Resuelto',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('claim_type')
                    ->label('Tipo')
                    ->options([
                        'reclamacion' => 'Reclamación',
                        'queja' => 'Queja',
                    ]),
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pending' => 'Pendiente',
                        'in_progress' => 'En Proceso',
                        'resolved' => 'Resuelto',
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
