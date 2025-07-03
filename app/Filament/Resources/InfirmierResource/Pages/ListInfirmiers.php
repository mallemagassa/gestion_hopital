<?php

namespace App\Filament\Resources\InfirmierResource\Pages;

use App\Filament\Resources\InfirmierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfirmiers extends ListRecords
{
    protected static string $resource = InfirmierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
