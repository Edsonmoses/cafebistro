<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Trusted;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddTrustedComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $status;
    public $postedby;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->status = '1';
    }
    public function generateSlug()
    {
        $placeObj = new Trusted();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $trustedNameURL = strtolower($final_slug);
        $this->slug = Str::slug($trustedNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($trustedNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $trustedNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $trustedNameURL;
        }
    }

    public function addTrusted()
    {
        $trusted = new Trusted();
        $trusted->name = $this->name;
        $trusted->slug  = $this->slug;
        $trusted->postedby  = $this->postedby;
        $trusted->status  = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img/sponsor', $imageName);
        $trusted->image = $imageName;
        $trusted->save();
        session()->flash('message', 'Logo added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Trusted By');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-trusted/');
        return view('livewire.admin.admin-add-trusted-component')->layout('layouts.base');
    }
}
