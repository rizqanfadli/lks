<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Games;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GamesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GamesResource\RelationManagers;

class GamesResource extends Resource
{
    protected static ?string $model = Games::class;

    protected static ?string $navigationIcon = 'heroicon-o-tv';
    protected static ?string $pluralModelLabel = 'Daftar Game';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Nama Game')
                ->placeholder('Masukkan Nama Game')
                ->required(),
                TextInput::make('slug')
                ->label('Kata Kunci')
                ->placeholder('Masukkan Kata Kunci')
                ->required(),
                TextInput::make('description')
                ->placeholder('Masukkan Deskripsi')
                ->required(),
                TextInput::make('created_by')
                ->label('Nama Pengunggah')
                ->placeholder('Nama Pengunggah')
                ->required(),
                FileUpload::make('img')
                ->default('thumbnail.png')
                ->nullable()
                ->columnSpan('full')
                ->image(),
                FileUpload::make('file')
                ->columnSpan('full')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->sortable()
                ->searchable(),
                TextColumn::make('slug')
                ->sortable()
                ->searchable(),
                TextColumn::make('description')
                ->sortable()
                ->searchable(),
                TextColumn::make('created_by')
                ->sortable()
                ->searchable(),
                ImageColumn::make('img')
                ->width(100)
                ->height(100),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGames::route('/'),
        ];
    }
}
