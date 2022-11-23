<?php

namespace App\Http\Livewire\Pages;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class BistroMenuListComponent extends Component
{
    public function render()
    {
        $menus = Menu::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $scategories = Subcategory::where('status', 1)->get();
        return view('livewire.pages.bistro-menu-list-component', ['menus' => $menus, 'categories' => $categories, 'scategories' => $scategories]);
    }
}
