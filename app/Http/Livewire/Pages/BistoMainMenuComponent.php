<?php

namespace App\Http\Livewire\Pages;

use App\Models\Pagesetting;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoMainMenuComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Menu');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/menu');

        $psetting = Pagesetting::all();
        return view('livewire.pages.bisto-main-menu-component', ['psetting' => $psetting])->layout('layouts.base');
    }
}
