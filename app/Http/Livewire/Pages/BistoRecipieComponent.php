<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Pagesetting;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoRecipieComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Recipie');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/recipie');

        $psetting = Pagesetting::all();
        return view('livewire.pages.bisto-recipie-component', ['psetting' => $psetting])->layout('layouts.base');
    }
}
