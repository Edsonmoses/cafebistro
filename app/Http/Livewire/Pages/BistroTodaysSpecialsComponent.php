<?php

namespace App\Http\Livewire\Pages;

use App\Models\Specials;
use Livewire\Component;

class BistroTodaysSpecialsComponent extends Component
{
    public function render()
    {
        $todays = Specials::all();
        return view('livewire.pages.bistro-todays-specials-component', ['todays' => $todays]);
    }
}
