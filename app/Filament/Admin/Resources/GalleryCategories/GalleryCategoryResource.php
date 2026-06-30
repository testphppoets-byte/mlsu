<?php

namespace App\Filament\Admin\Resources\GalleryCategories;

use App\Filament\Admin\Resources\GalleryCategories\Pages\CreateGalleryCategory;
use App\Filament\Admin\Resources\GalleryCategories\Pages\EditGalleryCategory;
use App\Filament\Admin\Resources\GalleryCategories\Pages\ListGalleryCategories;
use App\Filament\Admin\Resources\GalleryCategories\Schemas\GalleryCategoryForm;
use App\Filament\Admin\Resources\GalleryCategories\Tables\GalleryCategoriesTable;
use App\Models\GalleryCategory;
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

class GalleryCategoryResource extends Resource
{
    protected static ?string $model = GalleryCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')->required(),
	    Forms\Components\TextInput::make('u_name')->label('Identifier')->required(),
            Forms\Components\Textarea::make('description'),
        ]);
    }

    public static function table(Table $table): Table
    {
           return $table
            ->columns([
		Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('description')->limit(50),
Tables\Columns\TextColumn::make('u_name')->sortable()->searchable(),
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
            'index' => ListGalleryCategories::route('/'),
            'create' => CreateGalleryCategory::route('/create'),
            'edit' => EditGalleryCategory::route('/{record}/edit'),
        ];
    }
}
