<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo du site')
                    ->image()
                    ->disk('public')
                    ->directory('settings')
                    ->imagePreviewHeight('80')
                    ->nullable(),

                TextInput::make('telephone')
                    ->label('Téléphone')
                    ->tel()
                    ->maxLength(30)
                    ->nullable(),

                TextInput::make('email')
                    ->label('Email de contact')
                    ->email()
                    ->maxLength(100)
                    ->nullable(),
            ]);
    }
}
