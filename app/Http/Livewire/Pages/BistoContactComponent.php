<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoContactComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Contact us');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/contact');
        return view('livewire.pages.bisto-contact-component')->layout('layouts.base');
    }
}
