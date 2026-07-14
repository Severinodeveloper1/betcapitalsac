<?php

namespace App\Filament\Resources\Certifications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class CertificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Vista Previa')
                    ->square(),
                TextColumn::make('title')
                    ->label('Certificado')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('validity')
                    ->label('Vigencia')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50),
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
