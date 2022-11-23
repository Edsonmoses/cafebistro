<?php

namespace App\Http\Livewire\Pages;

use App\Models\BistroTeam;
use App\Models\Page;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistroAboutUsComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('About Us');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/about');

        $pages = Page::where('status', 1)->get();
        $teams = BistroTeam::where('status', 1)->get();
        return view('livewire.pages.bistro-about-us-component', ['pages' => $pages, 'teams' => $teams])->layout('layouts.base');
    }
}
