<?php

namespace App\Http\Livewire\Admin;

use App\Models\BistroTestimonials;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminBistroTestimonialsComponent extends Component
{
    public $status;
    public function mount()
    {
        $this->status = '1';
    }
    public function deleteMenu($id)
    {
        BistroTestimonials::find($id)->delete();
        session()->flash('message', 'Testimony Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $testimonils = BistroTestimonials::find($id);
        $testimonils->status = '1';
        $testimonils->save();
        session()->flash('message', 'Testimony activated Successfully.');
    }
    public function dectStatus($id)
    {
        $testimonils = BistroTestimonials::find($id);
        $testimonils->status = '0';
        $testimonils->save();
        session()->flash('message', 'Testimony deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Testimonial');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/testimonils/');

        $testimonils = BistroTestimonials::orderBy('name', 'ASC')->paginate(20);
        return view('livewire.admin.admin-bistro-testimonials-component', ['testimonils' => $testimonils])->layout('layouts.base');
    }
}
