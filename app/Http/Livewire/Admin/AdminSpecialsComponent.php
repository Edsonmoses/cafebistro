<?php

namespace App\Http\Livewire\Admin;

use App\Models\Specials;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminSpecialsComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        Specials::find($id)->delete();
        session()->flash('message', 'Specials Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $todays = Specials::find($id);
        $todays->status = '1';
        $todays->save();
        session()->flash('message', 'Specials activated Successfully.');
    }
    public function dectStatus($id)
    {
        $todays = Specials::find($id);
        $todays->status = '0';
        $todays->save();
        session()->flash('message', 'Specials deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Today&#x27;s Specials');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/specials');

        $todays = Specials::all();
        return view('livewire.admin.admin-specials-component', ['todays' => $todays])->layout('layouts.base');
    }
}
