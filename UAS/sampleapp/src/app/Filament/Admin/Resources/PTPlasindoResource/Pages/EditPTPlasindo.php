<?php

namespace App\Filament\Admin\Resources\PTPlasindoResource\Pages;

use App\Filament\Admin\Resources\PTPlasindoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPTPlasindo extends EditRecord
{
    protected static string $resource = PTPlasindoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
