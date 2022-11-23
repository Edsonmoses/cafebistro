<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
    public function deleteScategory($id)
    {
        Subcategory::find($id)->delete();
        session()->flash('message', 'Sub category Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $category = Category::find($id);
        $category->status = '1';
        $category->save();
        session()->flash('message', 'Category activated Successfully.');
    }
    public function updatesStatus($id)
    {
        $category = Category::find($id);
        $category->status = '1';
        $category->save();
        session()->flash('message', 'Sub category activated Successfully.');
    }
    public function dectStatus($id)
    {
        $category = Category::find($id);
        $category->status = '0';
        $category->save();
        session()->flash('message', 'Category deactivated Successfully.');
    }
    public function dectsStatus($id)
    {
        $category = Category::find($id);
        $category->status = '0';
        $category->save();
        session()->flash('message', 'Sub category deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/category/');

        $category = Category::all();
        return view('livewire.admin.admin-category-component', ['category' => $category])->layout('layouts.base');
    }
}
