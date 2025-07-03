<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('roles')
                    ->label(__('Role'))
                    ->required()
                    ->relationship(
                        name: 'roles',
                    )
                    ->getOptionLabelFromRecordUsing(fn (Role $record) => "{$record->name}")
                    ->searchable(['name'])
                    ->preload(),
                    Forms\Components\TextInput::make('password')
                        ->required()
                        ->maxLength(255)
                        ->label('Mot de passe')
                        ->password()
                        ->revealable()
                        ->visibleOn('create')
                        ->extraInputAttributes(['autocomplete' => 'new-password']) // Pour éviter l'auto-complétion du navigateur
                        ->afterStateUpdated(function (callable $set, $state) {
                            // Vous pouvez ajouter ici une logique pour afficher ou masquer le mot de passe
                        }),
                    Forms\Components\TextInput::make('password_confirmation')
                        ->required()
                        ->maxLength(255)
                        ->visibleOn('create')
                        ->label('Confirmer le mot de passe')
                        ->password()
                        ->revealable()
                        ->same('password')  // Validation pour vérifier que le mot de passe et sa confirmation correspondent
                        ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
