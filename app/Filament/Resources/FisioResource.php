<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FisioResource\Pages;
use App\Filament\Resources\FisioResource\RelationManagers;
use App\Models\Fisio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FisioResource extends Resource
{
    protected static ?string $model = Fisio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('apellidos'),

            Forms\Components\TextInput::make('col_num'),
            Forms\Components\TextInput::make('ccc'),
            Forms\Components\TextInput::make('dni'),
            Forms\Components\Select::make('user_id')
            ->relationship('user', 'name')
            ->required(),
            Forms\Components\DatePicker::make('fecha_nato')
            ->maxDate(now()),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('dni'),
               // Tables\Columns\TextColumn::make('date_of_birth'),
               Tables\Columns\TextColumn::make('user.name')
               ->searchable(),
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
            'index' => Pages\ListFisios::route('/'),
            'create' => Pages\CreateFisio::route('/create'),
            'edit' => Pages\EditFisio::route('/{record}/edit'),
        ];
    }
}
