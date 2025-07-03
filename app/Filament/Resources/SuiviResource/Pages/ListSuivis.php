<?php

namespace App\Filament\Resources\SuiviResource\Pages;

use App\Filament\Resources\SuiviResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuivis extends ListRecords
{
    protected static string $resource = SuiviResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
