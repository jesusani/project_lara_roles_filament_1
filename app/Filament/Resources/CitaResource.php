<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitaResource\Pages;
use App\Filament\Resources\CitaResource\RelationManagers;
use App\Models\Cita;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CitaResource extends Resource
{
    protected static ?string $model = Cita::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('paciente_id')
                ->relationship('paciente', 'name')
                ->required(),

            Forms\Components\DatePicker::make('fecha')
                ->required(),
            Forms\Components\TimePicker::make('hora')
                ->required()
                ->native(false)
                ->hoursStep(1)
                ->minutesStep(15)
                ->seconds('00'),

            Forms\Components\Select::make('fisio_id')
                ->relationship('fisio', 'name')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                ->searchable()
                ->sortable()

                ->dateTime('d-m-Y'),
            Tables\Columns\TextColumn::make('hora')
                ->dateTime('H:i')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('fisio.apellidos')
                ->searchable()
                ->sortable(),


            Tables\Columns\TextColumn::make('paciente.apellidos')
                /* ->getRelationship('Paciente', 'name') */
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('fisio_id'),
                /* ->getRelationship('Fisio', 'name'), */
                Tables\Filters\SelectFilter::make('fecha'),

            ])->headerActions([
                 Tables\Actions\AttachAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCitas::route('/'),
            'create' => Pages\CreateCita::route('/create'),
            'edit' => Pages\EditCita::route('/{record}/edit'),
        ];
    }
}
