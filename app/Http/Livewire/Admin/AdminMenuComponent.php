<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\WithPagination;

class AdminMenuComponent extends Component
{
    use WithPagination;
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        Menu::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $menus = Menu::find($id);
        $menus->status = '1';
        $menus->save();
        session()->flash('message', 'Menu activated Successfully.');
    }
    public function dectStatus($id)
    {
        $menus = Menu::find($id);
        $menus->status = '0';
        $menus->save();
        session()->flash('message', 'Menu deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Menu');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/menu/');

        $menus = Menu::orderBy('subcategory_id', 'ASC')->paginate(20);
        return view('livewire.admin.admin-menu-component', ['menus' => $menus])->layout('layouts.base');
    }
}
