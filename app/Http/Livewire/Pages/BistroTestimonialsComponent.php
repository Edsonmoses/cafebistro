<?php

namespace App\Http\Livewire\Pages;

use App\Models\BistroTestimonials;
use Livewire\Component;

class BistroTestimonialsComponent extends Component
{
    public function render()
    {
        $testimonies = BistroTestimonials::where('status', 1)->get();
        return view('livewire.pages.bistro-testimonials-component', ['testimonies' => $testimonies]);
    }
}
