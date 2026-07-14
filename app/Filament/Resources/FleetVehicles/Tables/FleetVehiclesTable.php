<?php

namespace App\Filament\Resources\FleetVehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FleetVehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->square(),
                TextColumn::make('name')
                    ->label('Vehículo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Categoría')
                    ->sortable(),
                TextColumn::make('capacity')
                    ->label('Capacidad'),
                TextColumn::make('dimensions')
                    ->label('Dimensiones')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('gps_status')
                    ->label('GPS')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Activo' => 'success',
                        default => 'warning',
                    }),
                IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Actualizado En')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Categoría'),
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
