<?php

namespace App\Filament\Resources\LitResource\Pages;

use App\Filament\Resources\LitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLit extends EditRecord
{
    protected static string $resource = LitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
