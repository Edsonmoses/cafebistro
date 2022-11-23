<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\BistroTestimonials;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddBistroTestimonialsComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $desc;
    public $position;
    public $status;
    public $postedby;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->status = '1';
    }
    public function generateSlug()
    {
        $placeObj = new BistroTestimonials();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $testimonilsNameURL = strtolower($final_slug);
        $this->slug = Str::slug($testimonilsNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($testimonilsNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $testimonilsNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug
                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.
                if (!$checkSlug) {
                    //There is not more coincidence. Finally found unique slug.
                    $this->slug = $newSlug; //New Slug 
                    break; //Break Loop
                }
            }
        } else {
            //Slug do not exists. Just use the selected Slug.
            $this->slug = $testimonilsNameURL;
        }
    }

    public function addtestimonils()
    {
        $testimonils = new BistroTestimonials();
        $testimonils->name = $this->name;
        $testimonils->slug  = $this->slug;
        $testimonils->desc  = $this->desc;
        $testimonils->position  = $this->position;
        $testimonils->postedby  = $this->postedby;
        $testimonils->status  = $this->status;
        $testimonils->save();
        session()->flash('message', 'Testimony added successfully 😁');
    }
    public function addBgImage()
    {
        $testimonils = new BistroTestimonials();
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img/sponsor', $imageName);
        $testimonils->image = $imageName;
        $testimonils->save();
        session()->flash('message', 'Bg image added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Testimonial');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-testimonils/');

        return view('livewire.admin.admin-add-bistro-testimonials-component')->layout('layouts.base');
    }
}
