<?php

namespace App\Filament\Resources\GamesResource\Pages;

use App\Filament\Resources\GamesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGames extends ManageRecords
{
    protected static string $resource = GamesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
