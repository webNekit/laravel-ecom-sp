<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Новая запись')->schema([
                    Tabs::make('Основная информация')->tabs([
                        Tabs\Tab::make('Основное')->schema([
                            Grid::make(2)->schema([
                                TextInput::make('title')
                                    ->label('Название записи')
                                    ->placeholder('Сезон скидок и акций')
                                    ->live()
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                    ->required(),
                                TextInput::make('slug')
                                    ->label('URL')
                                    ->disabled()
                                    ->maxLength(255)
                                    ->dehydrated()
                                    ->unique(Article::class, 'slug', ignoreRecord: true)
                                    ->required(),
                            ]),
                            Textarea::make('small_text')
                                ->rows(10)
                                ->label('Краткое описание')
                                ->required(),
                        ]),
                        Tabs\Tab::make('Meta-поля')->schema([
                            TextInput::make('meta_title')
                                ->label('Meta-заголовок')
                                ->placeholder('Сезон скидок и акций')
                                ->required(),
                            TextInput::make('meta_keywords')
                                ->label('Meta-ключевые слова')
                                ->placeholder('товары по скидкам, рассрочка, смартфоры, iphone 20')
                                ->required(),
                            Textarea::make('meta_description')
                                ->rows(5)
                                ->label('Meta-описание')
                                ->required(),
                        ]),
                    ]),
                ])->columnSpanFull(),
                Section::make('Контент')->schema([
                    RichEditor::make('content')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                        ->label('Контент статьи')
                        ->required(),
                ])->columnSpanFull(),
                Section::make('Медиа')->schema([
                    FileUpload::make('image')
                        ->label('Изображение статьи')
                        ->image()
                        ->directory('/articles'),
                ])->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Активная запись'),
                Toggle::make('is_popular')
                    ->label('Популярная запись'), 
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
