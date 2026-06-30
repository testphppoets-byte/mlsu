<?php

namespace App\Filament\Admin\Resources\Themes;

use App\Filament\Admin\Resources\Themes\Pages\CreateTheme;
use App\Filament\Admin\Resources\Themes\Pages\EditTheme;
use App\Filament\Admin\Resources\Themes\Pages\ListThemes;
use App\Filament\Admin\Resources\Themes\Schemas\ThemeForm;
use App\Filament\Admin\Resources\Themes\Tables\ThemesTable;
use App\Models\Theme;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions;
use UnitEnum;

class ThemeResource extends Resource
{
    protected static ?string $model = Theme::class;

    protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Theme';
   

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
                TextInput::make('site_name')
                    ->label('Site Name')
                    ->required(),

                TextInput::make('title')
                    ->label('Title'),

                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('themes/logos'),

               // TextInput::make('height')
                //    ->label('Logo Height'),

               // TextInput::make('width')
                //    ->label('Logo Width'),

                Textarea::make('head_content')
                    ->label('Header Content')
                    ->rows(5)
                    ->columnSpanFull(),

                Textarea::make('footer_content')
                    ->label('Footer Content')
                    ->rows(5)
                    ->columnSpanFull(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Site Name')
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Title'),

                ImageColumn::make('logo')
			 ->disk('public')                          			
                    ->label('Logo'),

              //  TextColumn::make('height')
              //      ->label('Height'),

              //  TextColumn::make('width')
              //      ->label('Width'),

                TextColumn::make('head_content')
                    ->label('Header Content')
                    ->limit(30),

                TextColumn::make('footer_content')
                    ->label('Footer Content')
                    ->limit(30),
            ])
            ->actions([
                Actions\EditAction::make(),  
            ])
            ->bulkActions([
               
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
   public static function canCreate(): bool
    {
        return false; // prevent creating new entries
    }

    public static function canDelete(Model $record): bool
    {
        return false; // prevent deleting the theme
    }

    public static function getPages(): array
    {
        return [
            'index' => ListThemes::route('/'),
            'create' => CreateTheme::route('/create'),
            'edit' => EditTheme::route('/{record}/edit'),
        ];
    }

   
}
