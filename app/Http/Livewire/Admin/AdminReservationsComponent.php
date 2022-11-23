<?php

namespace App\Http\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminReservationsComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        Reservation::find($id)->delete();
        session()->flash('message', 'Reservation Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $reservations = Reservation::find($id);
        $reservations->status = '1';
        $reservations->save();
        session()->flash('message', 'Reservation activated Successfully.');
    }
    public function dectStatus($id)
    {
        $reservations = Reservation::find($id);
        $reservations->status = '0';
        $reservations->save();
        session()->flash('message', 'Reservation deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Reservations');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/reservations');

        $reservations = Reservation::all();
        return view('livewire.admin.admin-reservations-component', ['reservations' => $reservations])->layout('layouts.base');
    }
}
