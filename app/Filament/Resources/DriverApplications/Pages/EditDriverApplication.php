<?php

namespace App\Filament\Resources\DriverApplications\Pages;

use App\Filament\Resources\DriverApplications\DriverApplicationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDriverApplication extends EditRecord
{
    protected static string $resource = DriverApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
