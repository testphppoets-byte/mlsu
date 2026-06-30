<?php

namespace App\Filament\Admin\Resources\GalleryCategories\Pages;

use App\Filament\Admin\Resources\GalleryCategories\GalleryCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGalleryCategory extends EditRecord
{
    protected static string $resource = GalleryCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
