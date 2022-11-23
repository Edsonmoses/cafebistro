<?php

namespace App\Http\Livewire\Pages;

use App\Models\Trusted;
use Livewire\Component;

class BistroTrustedComponent extends Component
{
    public function render()
    {
        $trusted = Trusted::where('status', 1)->get();
        return view('livewire.pages.bistro-trusted-component', ['trusted' => $trusted]);
    }
}
