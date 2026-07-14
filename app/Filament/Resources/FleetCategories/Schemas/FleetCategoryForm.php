<?php

namespace App\Filament\Resources\FleetCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FleetCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre de la Categoría')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug Identificador')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),
            ])->columns(1);
    }
}
