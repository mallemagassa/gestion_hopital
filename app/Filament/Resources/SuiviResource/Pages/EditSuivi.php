<?php

namespace App\Filament\Resources\SuiviResource\Pages;

use App\Filament\Resources\SuiviResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuivi extends EditRecord
{
    protected static string $resource = SuiviResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
