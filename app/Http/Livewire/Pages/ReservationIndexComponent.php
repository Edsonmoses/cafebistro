<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Pagesetting;
use App\Models\Reservation;

class ReservationIndexComponent extends Component
{
    public $datepicker;
    public $name;
    public $timepicker;
    public $email;
    public $guests;
    public $phone;

    public function addReservation()
    {
        $reservation = new Reservation();
        $reservation->datepicker = $this->datepicker;
        $reservation->name  = $this->name;
        $reservation->timepicker  = $this->timepicker;
        $reservation->email = $this->email;
        $reservation->guests  = $this->guests;
        $reservation->phone  = $this->phone;
        $reservation->save();
        session()->flash('message', 'Reservation added successfully 😁');

        $this->reset(['datepicker', 'name', 'timepicker', 'email', 'guests', 'phone']);
    }

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
        $psetting = Pagesetting::all();
        return view('livewire.pages.reservation-index-component', ['psetting' => $psetting])->layout('layouts.base');
    }
}
