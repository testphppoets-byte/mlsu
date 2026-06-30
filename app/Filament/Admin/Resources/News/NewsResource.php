<?php

namespace App\Filament\Admin\Resources\News;

use App\Filament\Admin\Resources\News\Pages\CreateNews;
use App\Filament\Admin\Resources\News\Pages\EditNews;
use App\Filament\Admin\Resources\News\Pages\ListNews;
use App\Filament\Admin\Resources\News\Schemas\NewsForm;
use App\Filament\Admin\Resources\News\Tables\NewsTable;
use App\Models\News;
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
use UnitEnum;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'News';

  //  protected static string | UnitEnum | null $navigationGroup = 'Theme Manager';

    public static function form(Schema $schema): Schema
    {
            return $schema->schema([
		TextInput::make('title')->required(),
		Forms\Components\Textarea::make('content'),
		TextInput::make('link')
		    ->label('Link'),
		Forms\Components\Select::make('category_id')
		    ->relationship('category', 'u_name')
		    ->required(),
		FileUpload::make('pdf')
                ->acceptedFileTypes(['application/pdf']) // only allow PDF
                ->directory('news_pdf') // stored in storage/app/public/pages
    		->disk('public')
                ->maxSize(2048) ->label('Upload News PDF')
    		->helperText('Only PDF files up to 2MB are allowed.'),
		  Forms\Components\DateTimePicker::make('valid_from')
			    ->label('Valid From'),
		  Forms\Components\DateTimePicker::make('valid_until')
			    ->label('Valid Until'),
		 Toggle::make('published'),
		]);
     }

    public static function table(Table $table): Table
    {
        return $table->columns([
        TextColumn::make('title')->sortable()->searchable(),
        TextColumn::make('category.name')->label('Category'),
        TextColumn::make('link')
            ->url(fn ($record) => $record->link)
            ->label('Link')
            ->openUrlInNewTab(),
	 IconColumn::make('published')
                    ->boolean()
                    ->label('Published'),
        TextColumn::make('valid_from')->dateTime()->label('Valid From'),
        TextColumn::make('valid_until')->dateTime()->label('Valid Until'),
        TextColumn::make('created_at')->date(),
    	]) ->actions([
                Actions\EditAction::make(),   // ✅ now resolves correctly
                Actions\DeleteAction::make(), // ✅ now resolves correctly
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
            'index' => ListNews::route('/'),
            'create' => CreateNews::route('/create'),
            'edit' => EditNews::route('/{record}/edit'),
        ];
    }
}
