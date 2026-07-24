<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipo / Canal')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'info',
                        'accounting' => 'success',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'general' => 'General',
                        'accounting' => 'Contabilidad',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'danger',
                        'read' => 'warning',
                        'archived' => 'gray',
                        default => 'primary',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Fecha de Envío')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'new' => 'Nuevo',
                        'read' => 'Leído',
                        'archived' => 'Archivado',
                    ]),
                SelectFilter::make('type')
                    ->label('Tipo / Canal')
                    ->options([
                        'general' => 'General',
                        'accounting' => 'Contabilidad',
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
