<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Specials;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\WithFileUploads;

class AdminEditSpecialsComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $subtitle;
    public $desc;
    public $image;
    public $newimage;
    public $menulink;
    public $postedby;

    public function mount($slug)
    {
        $todays = Specials::where('slug', $slug)->first();
        $this->name = $todays->name;
        $this->slug = $todays->slug;
        $this->subtitle = $todays->subtitle;
        $this->desc = $todays->desc;
        $this->image = $todays->image;
        $this->menulink = $todays->menulink;
        $this->postedby = Auth::user()->name;
        $this->today_id = $todays->id;
    }
    public function generateslug()
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $slugNameURL = strtolower($final_slug);
        $this->slug = Str::slug($slugNameURL);
    }
    public function addSpecials()
    {
        $todays = Specials::find($this->today_id);
        $todays->name = $this->name;
        $todays->slug  = $this->slug;
        $todays->subtitle  = $this->subtitle;
        $todays->desc = $this->desc;
        $todays->menulink  = $this->menulink;
        if ($this->newimage) {
            if ($todays->image) {
                unlink('assets/frontend/img' . '/' . $todays->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('img', $imageName);
            $todays->image = $imageName;
        }
        $todays->save();
        session()->flash('message', 'Todays Specials edited successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Today&#x27;s Specials');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-specials');
        return view('livewire.admin.admin-edit-specials-component')->layout('layouts.base');
    }
}
