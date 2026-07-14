<?php

namespace App\Filament\Resources\DriverApplications\Pages;

use App\Filament\Resources\DriverApplications\DriverApplicationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDriverApplications extends ListRecords
{
    protected static string $resource = DriverApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
