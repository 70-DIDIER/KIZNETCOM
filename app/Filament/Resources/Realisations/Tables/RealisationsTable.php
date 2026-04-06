<?php

namespace App\Filament\Resources\Realisations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RealisationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_principale')
                    ->label('Image')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('titre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('categorie')
                    ->badge()
                    ->searchable(),

                ColorColumn::make('couleur_categorie')
                    ->label('Couleur'),

                IconColumn::make('visible')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('ordre')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('ordre')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
