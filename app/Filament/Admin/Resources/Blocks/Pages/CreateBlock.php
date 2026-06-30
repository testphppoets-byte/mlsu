<?php

namespace App\Filament\Admin\Resources\Blocks\Pages;

use App\Filament\Admin\Resources\Blocks\BlockResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlock extends CreateRecord
{
    protected static string $resource = BlockResource::class;
}
