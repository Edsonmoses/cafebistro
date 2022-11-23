<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Admin Dashboard');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/dashboard');
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.base');
    }
}
