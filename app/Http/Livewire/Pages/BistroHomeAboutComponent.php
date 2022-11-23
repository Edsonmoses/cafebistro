<?php

namespace App\Http\Livewire\Pages;

use App\Models\Page;
use Livewire\Component;

class BistroHomeAboutComponent extends Component
{
    public function render()
    {
        $pages = Page::all();
        return view('livewire.pages.bistro-home-about-component', ['pages' => $pages]);
    }
}
