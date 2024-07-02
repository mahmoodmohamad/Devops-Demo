<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Roles;
use App\Models\Product;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ProductResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    
    public static function form(Form $form)
    {
        return $form
            ->schema([
                //
             
                Forms\Components\TextInput::make('name')->required()
                ->maxLength(255)->searchable(),
                Forms\Components\TextInput::make('description'),
                Forms\Components\TextInput::make('price')->numeric()
                ->prefix('€')
                ->maxValue(42949672.95),
                Forms\Components\TextInput::make('quantity'),
                
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('quantity'),
             
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListProducts::routeTo('/', 'index'),
            Pages\CreateProduct::routeTo('/create', 'create'),
            Pages\EditProduct::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
