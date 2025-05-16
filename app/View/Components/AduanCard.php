<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AduanCard extends Component
{

    public $aduan;
    /**
     * Create a new component instance.
     */
    public function __construct($aduan)
    {
         $this->aduan = $aduan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aduan-card');
    }
}
