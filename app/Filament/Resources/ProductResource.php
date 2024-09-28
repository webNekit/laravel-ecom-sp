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
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                        ->relationship('category', 'name')
                        ->label('Категория')
                        ->required(),
                ])->columnSpanFull(),
                Section::make('Характеристики')->schema([
                    Repeater::make('specifics')
                        ->label('Список хар-ик')
                        ->schema([
                            TextInput::make('name')
                                ->label('Название хар-ки')
                                ->placeholder('Оперативная память')
                                ->required(),
                            TextInput::make('value')
                                ->label('Значение хар-ки')
                                ->placeholder('16 гб.')
                                ->required()
                        ])->columns(2),
                ])->columnSpanFull(),
                Section::make('Медиа и изображения')->schema([
                    Repeater::make('images')
                        ->label('Доп. изображения')
                        ->minItems(2)
                        ->maxItems(7)
                        ->schema([
                            FileUpload::make('image')
                                ->image()
                                ->directory('/products/other-img')
                                ->required()
                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
