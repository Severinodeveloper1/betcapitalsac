<?php

namespace App\Filament\Resources\Benefits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BenefitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Beneficio')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('icon')
                    ->label('Icono (Material Symbol)'),
                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(60),
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
                //
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
