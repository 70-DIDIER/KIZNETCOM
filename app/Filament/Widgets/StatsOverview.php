<?php

namespace App\Filament\Widgets;

use App\Models\Realisation;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total   = Realisation::count();
        $visible = Realisation::where('visible', true)->count();
        $hidden  = Realisation::where('visible', false)->count();

        return [
            Stat::make('Total Projets', $total)
                ->description('Réalisations enregistrées')
                ->descriptionIcon('heroicon-o-folder-open')
                ->color('primary'),

            Stat::make('Projets Visibles', $visible)
                ->description('Affichés sur le site')
                ->descriptionIcon('heroicon-o-eye')
                ->color('success'),

            Stat::make('Projets Masqués', $hidden)
                ->description('Non affichés sur le site')
                ->descriptionIcon('heroicon-o-eye-slash')
                ->color('warning'),
        ];
    }
}
