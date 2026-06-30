<?php

namespace App\Filament\Admin\Resources\Pages;

use App\Filament\Admin\Resources\Pages\Pages\CreatePage;
use App\Filament\Admin\Resources\Pages\Pages\EditPage;
use App\Filament\Admin\Resources\Pages\Pages\ListPages;
use App\Filament\Admin\Resources\Pages\Schemas\PageForm;
use App\Filament\Admin\Resources\Pages\Tables\PagesTable;
use App\Models\Page;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pages';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('featured_image')
		    ->disk('public')
                    ->label('Image')
                    ->square(),

                IconColumn::make('published')
                    ->boolean()
                    ->label('Published'),
            ])
            ->filters([
                Filter::make('published')
                    ->label('Published Only')
                    ->query(fn ($query) => $query->where('published', true)),

                Filter::make('draft')
                    ->label('Draft Only')
                    ->query(fn ($query) => $query->where('published', false)),
            ])
             ->actions([
                Actions\EditAction::make(),   // ✅ now resolves correctly
                Actions\DeleteAction::make(), // ✅ now resolves correctly
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
		BulkAction::make('publish')
                        ->label('Publish Selected')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['published' => true])),
                 BulkAction::make('unpublish')
                        ->label('Unpublish Selected')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['published' => false])),
                ]),		
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->required(),

            TextInput::make('slug')
                ->unique(ignoreRecord: true) // ✅ v5 syntax
                ->required(),

            RichEditor::make('content')
                ->required(),

            FileUpload::make('featured_image')
                ->image()
                ->directory('pages') // stored in storage/app/public/pages
    		->disk('public')
                ->maxSize(2048),

            Toggle::make('published'),
        ]);
    }
}
