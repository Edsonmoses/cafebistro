<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoBlogSingleVideoComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Blog');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/blog-single-video');
        return view('livewire.pages.bisto-blog-single-video-component')->layout('layouts.base');
    }
}
