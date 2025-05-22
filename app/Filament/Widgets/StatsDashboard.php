<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Aduan;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Aduan Menunggu', Aduan::where('status', 'Menunggu')->count()),
            Stat::make('Aduan Diproses', Aduan::where('status', 'Diproses')->count()),
            Stat::make('Aduan Selesai', Aduan::where('status', 'Selesai')->count()),
            Stat::make('Total Aduan', Aduan::count()),
            
        ];
    }
}
