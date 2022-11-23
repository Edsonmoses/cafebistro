<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoRecipie3colComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Recipie');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/recipie-3-col');
        return view('livewire.pages.bisto-recipie3col-component')->layout('layouts.base');
    }
}
