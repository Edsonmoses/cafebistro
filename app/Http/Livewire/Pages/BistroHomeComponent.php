<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Subcategory;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistroHomeComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke');

        $pages = Page::where('status', 1)->get();
        $menus = Menu::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $scategories = Subcategory::where('status', 1)->get();
        return view('livewire.pages.bistro-home-component', ['pages' => $pages, 'menus' => $menus, 'categories' => $categories, 'scategories' => $scategories])->layout('layouts.base');
    }
}
