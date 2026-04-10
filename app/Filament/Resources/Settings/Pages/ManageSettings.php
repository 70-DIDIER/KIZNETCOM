<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingsResource;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class ManageSettings extends EditRecord
{
    protected static string $resource = SettingsResource::class;

    protected static ?string $title = 'Paramètres du site';

    public function mount(int | string $record = null): void
    {
        $this->record = Setting::instance();

        $this->fillForm();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Enregistrer');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Paramètres enregistrés avec succès.')
            ->success();
    }
}
