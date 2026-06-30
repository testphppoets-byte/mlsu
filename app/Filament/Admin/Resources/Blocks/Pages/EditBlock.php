<?php

namespace App\Filament\Admin\Resources\Blocks\Pages;

use App\Filament\Admin\Resources\Blocks\BlockResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBlock extends EditRecord
{
    protected static string $resource = BlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
