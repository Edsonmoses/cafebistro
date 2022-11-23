<?php

namespace App\Http\Livewire\Admin;

use App\Models\Trusted;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminTrustedComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        Trusted::find($id)->delete();
        session()->flash('message', 'Logo Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $trusted = Trusted::find($id);
        $trusted->status = '1';
        $trusted->save();
        session()->flash('message', 'Logo activated Successfully.');
    }
    public function dectStatus($id)
    {
        $trusted = Trusted::find($id);
        $trusted->status = '0';
        $trusted->save();
        session()->flash('message', 'Logo deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Trusted By');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/trusted/');

        $trusted = Trusted::orderBy('name', 'ASC')->paginate(20);
        return view('livewire.admin.admin-trusted-component', ['trusted' => $trusted])->layout('layouts.base');
    }
}
