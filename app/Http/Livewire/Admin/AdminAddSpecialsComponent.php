<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Specials;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddSpecialsComponent extends Component
{
    public $name;
    public $slug;
    public $subtitle;
    public $desc;
    public $image;
    public $menulink;
    public $postedby;

    use WithFileUploads;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->pcategory_id = '0';
    }
    public function generateSlug()
    {
        $placeObj = new Specials();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $specialsdNameURL = strtolower($final_slug);
        $this->slug = Str::slug($specialsdNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($specialsdNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $specialsdNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $specialsdNameURL;
        }
    }

    public function addSpecials()
    {
        $todays = new Specials();
        $todays->name = $this->name;
        $todays->slug  = $this->slug;
        $todays->subtitle  = $this->subtitle;
        $todays->desc = $this->desc;
        $todays->menulink  = $this->slug;
        $todays->postedby  = $this->postedby;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img', $imageName);
        $todays->image = $imageName;
        $todays->save();
        session()->flash('message', 'Todays Specials added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Today&#x27;s Specials');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-specials');

        return view('livewire.admin.admin-add-specials-component')->layout('layouts.base');
    }
}
