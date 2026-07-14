<?php

namespace App\Filament\Resources\DriverApplications;

use App\Filament\Resources\DriverApplications\Pages\CreateDriverApplication;
use App\Filament\Resources\DriverApplications\Pages\EditDriverApplication;
use App\Filament\Resources\DriverApplications\Pages\ListDriverApplications;
use App\Filament\Resources\DriverApplications\Schemas\DriverApplicationForm;
use App\Filament\Resources\DriverApplications\Tables\DriverApplicationsTable;
use App\Models\DriverApplication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DriverApplicationResource extends Resource
{
    protected static ?string $model = DriverApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string|\UnitEnum|null $navigationGroup = 'Solicitudes';

    protected static ?string $navigationLabel = 'Postulaciones';

    protected static ?string $modelLabel = 'Postulación';

    protected static ?string $pluralModelLabel = 'Postulaciones';

    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return DriverApplicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DriverApplicationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDriverApplications::route('/'),
            'edit' => EditDriverApplication::route('/{record}/edit'),
        ];
    }
}
