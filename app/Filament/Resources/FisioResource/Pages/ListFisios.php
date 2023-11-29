<?php

namespace App\Filament\Resources\FisioResource\Pages;

use App\Filament\Resources\FisioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFisios extends ListRecords
{
    protected static string $resource = FisioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
