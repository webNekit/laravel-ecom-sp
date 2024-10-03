<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Основная информация')->schema([
            Select::make('category_id')
            ->label('Категория')
            ->required()
            ->relationship('category', 'name'),
            ])->columnSpanFull(),
            Section::make('Информация о товаре')->schema([
            TextInput::make('name')
            ->label('Название')
            ->placeholder('материнка')
            ->required(),
            TextInput::make('price')
            ->label('Цена')
            ->required(),
            TextInput::make('description')
            ->label('Описание')
            ->required(),
            TextInput::make('slug')
            ->label('slug')
            ->required(),
            TextInput::make('sale')
            ->label('sale'),
            FileUpload::make('img')
            ->image()
            ->directory('/products/images')
            ->required()
            ])->columnSpanFull(),
            Section::make('Характеристики')->schema([
            Repeater::make('specifics')->label('Список характеристик ')->schema([
            TextInput::make('name')
            ->label('Название характеристики')
            ->placeholder('материнка ')
            ->required(),
            TextInput::make('value')
            ->label('Значение характеристики')
            ->required(),
            ])->columns(2)
            ])->columnSpanFull(),
            Section::make('Медиа и изображение')->schema([
            Repeater::make('images')
            ->label('Доп изобр')
            ->maxItems(7)
            ->minItems(1)
            ->schema([
            FileUpload::make('image')
            ->image()
            ->directory('/products/images')
            ->required()
            ])
            ])->columnSpanFull(),
            Toggle::make('is_popular')
            ->label('Популярный')
            ->required(),
            Toggle::make('is_active')
            ->label('Активный')
            ->required(),
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
