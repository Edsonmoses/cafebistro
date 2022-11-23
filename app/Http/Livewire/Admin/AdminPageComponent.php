<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminPageComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $pages = Page::find($id);
        $pages->status = '1';
        $pages->save();
        session()->flash('message', 'Page activated Successfully.');
    }
    public function dectStatus($id)
    {
        $pages = Page::find($id);
        $pages->status = '0';
        $pages->save();
        session()->flash('message', 'Page deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Page');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/page');

        $pages = Page::all();
        return view('livewire.admin.admin-page-component', ['pages' => $pages])->layout('layouts.base');
    }
}
