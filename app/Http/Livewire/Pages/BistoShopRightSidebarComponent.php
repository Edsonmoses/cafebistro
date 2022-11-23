<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoShopRightSidebarComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Shop');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/shop-right-sidebar');
        return view('livewire.pages.bisto-shop-right-sidebar-component')->layout('layouts.base');
    }
}
