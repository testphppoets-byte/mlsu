<?php

namespace App\Filament\Admin\Resources\Media;

use App\Filament\Admin\Resources\Media\Pages\CreateMedia;
use App\Filament\Admin\Resources\Media\Pages\EditMedia;
use App\Filament\Admin\Resources\Media\Pages\ListMedia;
use App\Filament\Admin\Resources\Media\Schemas\MediaForm;
use App\Filament\Admin\Resources\Media\Tables\MediaTable;
//use App\Models\Media;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms;
use Filament\Actions;
use UnitEnum;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $recordTitleAttribute = 'Media Manager';
    
    protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
	FileUpload::make('file_name')
		->image()
		->directory('media-library')
		->disk('public') 
		->preserveFilenames()
		->maxSize(10240),

        TextInput::make('name')
            ->label('Title'),
	
	TextInput::make('collection_name')
            ->label('Collection'),

        Forms\Components\Hidden::make('mime_type')
            ->disabled(),

        Forms\Components\Hidden::make('size')
            ->disabled(),

        Textarea::make('custom_properties.alt')
            ->label('Alt Text'),

        Textarea::make('custom_properties.caption')
            ->label('Caption'),
	Forms\Components\Hidden::make('disk')
		->default('public'),
    ]);
    }

    public static function table(Table $table): Table
    {
          return $table
            ->columns([
	ImageColumn::make('file_name')
		->label('Image')
		->disk('public')
		->square(),
        TextColumn::make('name')
            ->searchable()
            ->sortable(),
	TextColumn::make('collection_name')
            ->searchable()
            ->sortable(),
        TextColumn::make('created_at')
            ->dateTime()
            ->sortable(),
            ])->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make(),
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
            'index' => ListMedia::route('/'),
            'create' => CreateMedia::route('/create'),
            'edit' => EditMedia::route('/{record}/edit'),
        ];
    }
}
