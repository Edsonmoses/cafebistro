<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pcategory;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminPageCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        Pcategory::find($id)->delete();
        session()->flash('message', 'Page category deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $pcategory = Pcategory::find($id);
        $pcategory->status = '1';
        $pcategory->save();
        session()->flash('message', 'Page category activated Successfully.');
    }
    public function dectStatus($id)
    {
        $pcategory = Pcategory::find($id);
        $pcategory->status = '0';
        $pcategory->save();
        session()->flash('message', 'Category deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/category/');

        $pcategory = Pcategory::all();
        return view('livewire.admin.admin-page-category-component', ['pcategory' => $pcategory])->layout('layouts.base');
    }
}
