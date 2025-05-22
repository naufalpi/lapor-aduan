<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Aduan;

class StatusAduanChart extends ChartWidget
{
    protected static ?string $heading = 'Status Aduan';

    protected function getData(): array
    {
        $data = Aduan::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return [
            'datasets' => [
                [
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}