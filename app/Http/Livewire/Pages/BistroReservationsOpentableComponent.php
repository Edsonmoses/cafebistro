<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class BistroReservationsOpentableComponent extends Component
{
    public $datepicker;
    public $timepicker;
    public $guests;

    public function addReservationOT()
    {
        $reservation = new Reservation();
        $reservation->datepicker = $this->datepicker;
        $reservation->timepicker  = $this->timepicker;
        $reservation->guests  = $this->guests;
        $reservation->save();
        session()->flash('message', 'Reservation added successfully 😁');
        $this->reset(['datepicker', 'timepicker', 'guests']);
    }
    public function render()
    {
        return view('livewire.pages.bistro-reservations-opentable-component');
    }
}
