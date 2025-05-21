<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Aduan;

class AduanList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $aduans = Aduan::where('judul', 'like', '%' . $this->search . '%')
            ->orWhere('kategori', 'like', '%' . $this->search . '%')
            ->paginate(9); // 9 items per page

        return view('livewire.aduan-list', [
            'aduans' => $aduans,
        ]);
    }
}
   
