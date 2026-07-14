<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información Enviada por el Usuario')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre Completo')
                            ->disabled(),
                        TextInput::make('company')
                            ->label('Empresa')
                            ->disabled(),
                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->disabled(),
                        Textarea::make('message')
                            ->label('Mensaje')
                            ->disabled()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Gestión y Seguimiento Interno')
                    ->schema([
                        Select::make('status')
                            ->label('Estado de Gestión')
                            ->options([
                                'new' => 'Nuevo (Sin leer)',
                                'read' => 'Leído / En Proceso',
                                'archived' => 'Archivado',
                            ])
                            ->required()
                            ->default('new'),
                        Textarea::make('notes')
                            ->label('Notas Internas de Seguimiento')
                            ->placeholder('Registre aquí el seguimiento comercial realizado con este contacto...')
                            ->rows(3),
                    ])
                    ->columns(1),
            ])->columns(1);
    }
}
