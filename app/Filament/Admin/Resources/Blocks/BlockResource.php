<?php

namespace App\Filament\Admin\Resources\Blocks;

use App\Filament\Admin\Resources\Blocks\Pages\CreateBlock;
use App\Filament\Admin\Resources\Blocks\Pages\EditBlock;
use App\Filament\Admin\Resources\Blocks\Pages\ListBlocks;
use App\Filament\Admin\Resources\Blocks\Schemas\BlockForm;
use App\Filament\Admin\Resources\Blocks\Tables\BlocksTable;
use App\Models\Block;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Block';

    protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->required(),

            TextInput::make('slug')
                ->unique(ignoreRecord: true) // ✅ v5 syntax
                ->required(),

           Textarea::make('content')
	    ->rows(10)
	    ->label('Block HTML'),

            Toggle::make('published'),
        ]);
    }

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
            'index' => ListBlocks::route('/'),
            'create' => CreateBlock::route('/create'),
            'edit' => EditBlock::route('/{record}/edit'),
        ];
    }
}
