<?php

namespace App\Filament\Resources\RendezVousResource\Pages;

use App\Filament\Resources\RendezVousResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRendezVous extends EditRecord
{
    protected static string $resource = RendezVousResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
