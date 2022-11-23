<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoShopCheckoutComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Shop Checkout');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/shop-checkout');
        return view('livewire.pages.bisto-shop-checkout-component')->layout('layouts.base');
    }
}
