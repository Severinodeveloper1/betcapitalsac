<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información Básica y SEO')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título Interno (Solo Lectura)')
                            ->disabled()
                            ->columnSpan(1),
                        TextInput::make('slug')
                            ->label('Slug Identificador')
                            ->disabled()
                            ->columnSpan(1),
                        TextInput::make('meta_title')
                            ->label('Título SEO (Meta Title)')
                            ->columnSpan(1),
                        Textarea::make('meta_description')
                            ->label('Descripción SEO (Meta Description)')
                            ->rows(2)
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Section::make('Banner Principal (Hero)')
                    ->schema([
                        TextInput::make('hero_title')
                            ->label('Título del Banner')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('hero_subtitle')
                            ->label('Subtítulo del Banner')
                            ->rows(3)
                            ->columnSpanFull(),
                        FileUpload::make('hero_image')
                            ->label('Imagen de Fondo')
                            ->image()
                            ->disk('public')
                            ->directory('pages')
                            ->columnSpanFull(),
                        TextInput::make('hero_cta_text')
                            ->label('Texto de Botón CTA')
                            ->visible(fn($record) => $record?->slug === 'inicio'),
                        TextInput::make('hero_cta_url')
                            ->label('Enlace de Botón CTA')
                            ->visible(fn($record) => $record?->slug === 'inicio'),
                    ])
                    ->columns(2),
 
                // Secciones específicas de la página de Inicio
                Section::make('Sección Homologación y Excelencia')
                    ->visible(fn($record) => $record?->slug === 'inicio')
                    ->schema([
                        Toggle::make('section_data.empresa_homologada')
                            ->label('Mostrar distintivo de Empresa Homologada')
                            ->columnSpanFull(),
                        TextInput::make('section_data.homologation_title')
                            ->label('Título de Homologación')
                            ->columnSpanFull(),
                        Textarea::make('section_data.homologation_description')
                            ->label('Descripción Detallada')
                            ->rows(4)
                            ->columnSpanFull(),
                        FileUpload::make('section_data.homologation_image')
                            ->label('Imagen Lateral')
                            ->image()
                            ->disk('public')
                            ->directory('pages')
                            ->columnSpanFull(),
                        Repeater::make('section_data.homologation_features')
                            ->label('Características / Certificados Secundarios')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Título')
                                    ->required(),
                                TextInput::make('description')
                                    ->label('Descripción Corta')
                                    ->required(),
                                TextInput::make('icon')
                                    ->label('Icono (Material Symbol, ej: shield_check, speed)')
                                    ->required(),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ]),

                // Secciones específicas de la página Nosotros
                Section::make('Identidad Corporativa (Misión & Visión)')
                    ->visible(fn($record) => $record?->slug === 'nosotros')
                    ->schema([
                        Section::make('Misión')
                            ->schema([
                                TextInput::make('section_data.mission_title')
                                    ->label('Título Misión')
                                    ->required(),
                                Textarea::make('section_data.mission_content')
                                    ->label('Contenido Misión')
                                    ->rows(3)
                                    ->required(),
                                TextInput::make('section_data.mission_icon')
                                    ->label('Icono Misión (ej: track_changes)')
                                    ->required(),
                            ]),
                        Section::make('Visión')
                            ->schema([
                                TextInput::make('section_data.vision_title')
                                    ->label('Título Visión')
                                    ->required(),
                                Textarea::make('section_data.vision_content')
                                    ->label('Contenido Visión')
                                    ->rows(3)
                                    ->required(),
                                TextInput::make('section_data.vision_icon')
                                    ->label('Icono Visión (ej: visibility)')
                                    ->required(),
                            ]),
                    ])
                    ->columns(2),

                Section::make('Liderazgo y Equipo')
                    ->visible(fn($record) => $record?->slug === 'nosotros')
                    ->schema([
                        TextInput::make('section_data.team_title')
                            ->label('Título de Sección')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('section_data.team_description')
                            ->label('Descripción de Sección')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                        FileUpload::make('section_data.team_image')
                            ->label('Imagen del Equipo Boardroom')
                            ->image()
                            ->disk('public')
                            ->directory('pages')
                            ->columnSpanFull(),
                    ]),
            ])->columns(1);
    }
}
