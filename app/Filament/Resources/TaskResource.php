<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Filament\Roles;
use App\Models\Task;
use App\Models\User; // Import User model
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;


class TaskResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
        ->schema([
            Components\TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),
            Components\Textarea::make('description')
                ->label('Description')
                ->nullable(),
            Components\Select::make('status')
                ->label('Status')
                ->options([
                    'pending' => 'Pending',
                    'in-progress' => 'In Progress',
                    'completed' => 'Completed',
                ])
                ->required(),
            Components\Select::make('priority')
                ->label('Priority')
                ->options([
                    'high' => 'High',
                    'medium' => 'Medium',
                    'low' => 'Low',
                ])
                ->required(),
            Components\DatePicker::make('start_date')
                ->label('Start Date'),
            Components\TextInput::make('duration')
                ->label('Duration')
                ->numeric(),
            Components\DatePicker::make('due_date')
                ->label('Due Date'),
        ]);
    }

    public static function table(Table $table)
    {
        return $table
        ->columns([
            TextColumn::make('title')
                ->label('Title'),
           TextColumn::make('status')
                ->label('Status'),
            TextColumn::make('priority')
                ->label('Priority'),
           TextColumn::make('start_date')
                ->label('Start Date')
                ->date(),
          TextColumn::make('due_date')
                ->label('Due Date')
                ->date(),
            TextColumn::make('user_id')
                ->label('User')
                ->getValueUsing(function ($task) {
                    return $task->user->name; // Assuming 'name' is a property in the User model
                }),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
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
            Pages\ListTasks::routeTo('/', 'index'),
            Pages\CreateTask::routeTo('/create', 'create'),
            Pages\EditTask::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
