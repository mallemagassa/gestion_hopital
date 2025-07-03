<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RendezVous;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RendezVousResource\Pages;
use App\Filament\Resources\RendezVousResource\RelationManagers;

class RendezVousResource extends Resource
{
    protected static ?string $model = RendezVous::class;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-date-range';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TimePicker::make('heure')
                    ->label('Heure')
                    ->format('H:i') // Format 24h
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('validation')
                    ->required()
                    ->numeric(),
                Select::make('patient_id')
                    ->label('Patient')
                    ->relationship('patient', 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('heure'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('validation')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('patient.nom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRendezVouses::route('/'),
            'create' => Pages\CreateRendezVous::route('/create'),
            'edit' => Pages\EditRendezVous::route('/{record}/edit'),
        ];
    }
}
