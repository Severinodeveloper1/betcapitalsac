<?php

namespace App\Filament\Resources\CompanyDocuments;

use App\Filament\Resources\CompanyDocuments\Pages\CreateCompanyDocument;
use App\Filament\Resources\CompanyDocuments\Pages\EditCompanyDocument;
use App\Filament\Resources\CompanyDocuments\Pages\ListCompanyDocuments;
use App\Filament\Resources\CompanyDocuments\Schemas\CompanyDocumentForm;
use App\Filament\Resources\CompanyDocuments\Tables\CompanyDocumentsTable;
use App\Models\CompanyDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompanyDocumentResource extends Resource
{
    protected static ?string $model = CompanyDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolderArrowDown;

    protected static string|\UnitEnum|null $navigationGroup = 'Soporte';

    protected static ?string $navigationLabel = 'Documentación';

    protected static ?string $modelLabel = 'Documento';

    protected static ?string $pluralModelLabel = 'Documentos';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return CompanyDocumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompanyDocumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanyDocuments::route('/'),
            'create' => CreateCompanyDocument::route('/create'),
            'edit' => EditCompanyDocument::route('/{record}/edit'),
        ];
    }
}
