<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class StatistikAduanPerBulan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Statistik';

    protected static string $view = 'filament.pages.statistik-aduan-per-bulan';
}
