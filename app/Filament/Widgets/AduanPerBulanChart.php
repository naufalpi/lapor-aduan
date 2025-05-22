<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Aduan;

class AduanPerBulanChart extends ChartWidget
{
    protected static ?string $heading = 'Aduan per Bulan';

    protected function getData(): array
    {
        $data = Aduan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $values = [];

        foreach ($data as $item) {
            $labels[] = now()->setMonth($item->bulan)->translatedFormat('F');
            $values[] = $item->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Aduan',
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
