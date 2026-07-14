<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Página')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Identificador (Slug)')
                    ->badge()
                    ->color('primary'),
                TextColumn::make('meta_title')
                    ->label('Título SEO'),
                TextColumn::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // Deshabilitar bulk actions para evitar borrado accidental de páginas estáticas
            ]);
    }
}
