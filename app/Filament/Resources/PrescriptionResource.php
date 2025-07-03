<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Prescription;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrescriptionResource\Pages;
use App\Filament\Resources\PrescriptionResource\RelationManagers;

class PrescriptionResource extends Resource
{
    protected static ?string $model = Prescription::class;

    protected static ?string $navigationIcon = 'fas-prescription-bottle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Select::make('consultation_id')
                    ->label('Consultation')
                    ->relationship('consultation.medecin', 'matricule')
                    ->searchable()
                    ->preload()
                    ->required(),
                // Forms\Components\TextInput::make('consultation_id')
                //     ->required()
                //     ->numeric(),
                MultiSelect::make('medicaments')
                    ->label('medicaments liées')
                    ->relationship('medicaments', 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('consultation.medecin.matricule')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('medicaments')
                    ->label('Médicaments')
                    ->formatStateUsing(function ($record) {
                        return $record->medicaments->pluck('nom')->join(', ');
                    })
                    ->sortable(false)
                    ->searchable(false),
                
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
            'index' => Pages\ListPrescriptions::route('/'),
            'create' => Pages\CreatePrescription::route('/create'),
            'edit' => Pages\EditPrescription::route('/{record}/edit'),
        ];
    }
}
