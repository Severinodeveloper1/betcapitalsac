<?php

namespace App\Filament\Resources\GeneralSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GeneralSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('office_address')
                    ->label('Dirección')
                    ->limit(40),
                TextColumn::make('email')
                    ->label('Correo Electrónico'),
                TextColumn::make('phone')
                    ->label('Teléfono'),
                TextColumn::make('whatsapp_number')
                    ->label('WhatsApp'),
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
                // Deshabilitar acciones masivas para evitar borrado accidental
            ]);
    }
}
