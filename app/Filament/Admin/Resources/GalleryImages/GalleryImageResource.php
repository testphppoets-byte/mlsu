<?php

namespace App\Filament\Admin\Resources\GalleryImages;

use App\Filament\Admin\Resources\GalleryImages\Pages\CreateGalleryImage;
use App\Filament\Admin\Resources\GalleryImages\Pages\EditGalleryImage;
use App\Filament\Admin\Resources\GalleryImages\Pages\ListGalleryImages;
use App\Filament\Admin\Resources\GalleryImages\Schemas\GalleryImageForm;
use App\Filament\Admin\Resources\GalleryImages\Tables\GalleryImagesTable;
use App\Models\GalleryImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Actions;
use Filament\Forms\Components\Toggle;
use UnitEnum;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    protected static string | UnitEnum | null $navigationGroup = 'Image Gallery';

    public static function form(Schema $schema): Schema
    {
       return $schema->schema([
            Forms\Components\Select::make('gallery_id')
                ->relationship('gallery', 'title')
                ->required(),
            Forms\Components\FileUpload::make('image_path')
                ->image()
		->disk('public')
                ->directory('gallery_images')
                ->required(),
            Forms\Components\TextInput::make('caption'),
        ]);
    }

    public static function table(Table $table): Table
    {
         return $table->columns([
            Tables\Columns\ImageColumn::make('image_path')->disk('public')->square(),
            Tables\Columns\TextColumn::make('caption'),
            Tables\Columns\TextColumn::make('gallery.title')->label('Gallery'),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleryImages::route('/'),
            'create' => CreateGalleryImage::route('/create'),
            'edit' => EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
