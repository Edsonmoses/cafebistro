<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class UserDashboardComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('User Dashboard');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/user/dashboard');
        return view('livewire.user.user-dashboard-component')->layout('layouts.base');
    }
}
