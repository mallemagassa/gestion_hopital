<?php

namespace App\Filament\Resources\RendezVousResource\Pages;

use App\Filament\Resources\RendezVousResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRendezVouses extends ListRecords
{
    protected static string $resource = RendezVousResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
