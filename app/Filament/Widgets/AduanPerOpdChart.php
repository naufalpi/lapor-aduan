<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Aduan;
use App\Models\Opd;

class AduanPerOpdChart extends ChartWidget
{
    protected static ?string $heading = 'Aduan per OPD';

    protected function getData(): array
    {
        $data = Aduan::selectRaw('opd_id, COUNT(*) as total')
            ->groupBy('opd_id')
            ->pluck('total', 'opd_id');

        $labels = Opd::whereIn('id', $data->keys())->pluck('nama', 'id');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Aduan',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $labels->values(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
