<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacienteResource\Pages;
use App\Filament\Resources\PacienteResource\RelationManagers;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PacienteResource extends Resource
{
    protected static ?string $model = Paciente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('apellidos'),
            Forms\Components\Select::make('direccion')
            ->options([
                'mostoles' => 'Móstoles',
                'alcorcon' => 'Alcorcón',
                'fuenlabrada' => 'Fuenlabrada',
                'villaviciosa' => 'Villaviciosa',
                'arroyomolinos' => 'Arroyomolinos',
                'otros' => 'otros',
            ]),
            Forms\Components\TextInput::make('ocupacion'),
            Forms\Components\TextInput::make('ocio'),
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
                //Tables\Filters\SelectFilter::make('direccion')->getOptions(),
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
            RelationManagers\TelefonoRelationManager::class,
            RelationManagers\CitasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacientes::route('/'),
            'create' => Pages\CreatePaciente::route('/create'),
            'edit' => Pages\EditPaciente::route('/{record}/edit'),
        ];
    }
}
