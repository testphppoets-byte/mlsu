<?php

namespace App\Filament\Admin\Resources\Menus;

use App\Filament\Admin\Resources\Menus\Pages\CreateMenu;
use App\Filament\Admin\Resources\Menus\Pages\EditMenu;
use App\Filament\Admin\Resources\Menus\Pages\ListMenus;
use App\Filament\Admin\Resources\Menus\Schemas\MenuForm;
use App\Filament\Admin\Resources\Menus\Tables\MenusTable;
use App\Models\Menu;
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

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Menu';
	
    protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    public static function form(Schema $schema): Schema
    {
         return $schema->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->label('Menu Title'),

            Forms\Components\TextInput::make('url')
                ->label('Link URL'),

            Forms\Components\Select::make('parent_id')
                ->label('Parent Menu')
                ->options(Menu::pluck('title', 'id'))
                ->searchable()
                ->nullable(),

            Forms\Components\TextInput::make('order')
                ->numeric()
                ->default(0)
                ->label('Order'),

	   Toggle::make('is_child_megamenu')->label('Is Sub Megamenu'),
        ]);
    }

    public static function table(Table $table): Table
    {
         return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('url')->searchable(),
                Tables\Columns\TextColumn::make('parent.title')->label('Parent'),
                Tables\Columns\TextColumn::make('order')->sortable(),
		Tables\Columns\IconColumn::make('is_child_megamenu')
                    ->boolean()
                    ->label('Is Sub Megamenu'),
            ])
            ->actions([
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
            'index' => ListMenus::route('/'),
            'create' => CreateMenu::route('/create'),
            'edit' => EditMenu::route('/{record}/edit'),
        ];
    }
}
