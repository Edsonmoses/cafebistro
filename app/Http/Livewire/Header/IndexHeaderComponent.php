<?php

namespace App\Http\Livewire\Header;

use Livewire\Component;
use App\Models\Pagesetting;

class IndexHeaderComponent extends Component
{
    public function render()
    {
        $psetting = Pagesetting::all();
        return view('livewire.header.index-header-component', ['psetting' => $psetting]);
    }
}
