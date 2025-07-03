<?php

namespace App\Filament\Resources\InfirmierResource\Pages;

use App\Filament\Resources\InfirmierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfirmier extends EditRecord
{
    protected static string $resource = InfirmierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
