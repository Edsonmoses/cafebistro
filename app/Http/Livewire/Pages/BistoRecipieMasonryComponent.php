<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoRecipieMasonryComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Recipie Detail');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/recipie-detail-masonry');
        return view('livewire.pages.bisto-recipie-masonry-component')->layout('layouts.base');
    }
}
