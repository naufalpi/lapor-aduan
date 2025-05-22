<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Aduan;

class AduanPerKategoriChart extends ChartWidget
{
    protected static ?string $heading = 'Aduan per Kategori';

    protected function getData(): array
    {
        $data = Aduan::selectRaw('kategori, COUNT(*) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

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
        return 'bar';
    }
}