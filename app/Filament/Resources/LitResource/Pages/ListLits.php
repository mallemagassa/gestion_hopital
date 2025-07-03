<?php

namespace App\Filament\Resources\LitResource\Pages;

use App\Filament\Resources\LitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLits extends ListRecords
{
    protected static string $resource = LitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
