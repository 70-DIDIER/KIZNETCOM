<?php

namespace App\Filament\Resources\Realisations\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RealisationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('categorie')
                    ->required()
                    ->maxLength(100),

                ColorPicker::make('couleur_categorie')
                    ->required()
                    ->default('#29ABE2'),

                Textarea::make('description')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('lien')
                    ->url()
                    ->placeholder('https://exemple.com')
                    ->nullable(),

                FileUpload::make('image_principale')
                    ->label('Image principale (miniature)')
                    ->image()
                    ->disk('public')
                    ->directory('realisations')
                    ->required(),

                FileUpload::make('images')
                    ->label('Galerie d\'images')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->directory('realisations/galerie')
                    ->nullable()
                    ->columnSpanFull(),

                Toggle::make('visible')
                    ->label('Visible sur le site')
                    ->default(true),

                TextInput::make('ordre')
                    ->label('Ordre d\'affichage')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
