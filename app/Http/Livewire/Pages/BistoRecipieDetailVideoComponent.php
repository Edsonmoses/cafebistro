<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoRecipieDetailVideoComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Recipie Detail');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/recipie-detail-vedio');
        return view('livewire.pages.bisto-recipie-detail-video-component')->layout('layouts.base');
    }
}
