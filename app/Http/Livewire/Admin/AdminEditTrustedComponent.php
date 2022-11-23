<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Trusted;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminEditTrustedComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $status;
    public $postedby;

    public function mount($slug)
    {
        $trusted = Trusted::where('slug', $slug)->first();
        $this->name = $trusted->name;
        $this->slug = $trusted->slug;
        $this->status = $trusted->status;
        $this->image = $trusted->image;
        $this->postedby = Auth::user()->name;
        $this->trusted_id = $trusted->id;
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

    public function updateTrusted()
    {
        $trusted = Trusted::find($this->trusted_id);
        $trusted->name = $this->name;
        $trusted->slug  = $this->slug;
        if ($this->newimage) {
            if ($trusted->image) {
                unlink('assets/frontend/img/sponsor' . '/' . $trusted->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('img/sponsor', $imageName);
            $trusted->image = $imageName;
        }
        $trusted->save();
        session()->flash('message', 'Logo added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Trusted By');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-trusted/');

        return view('livewire.admin.admin-edit-trusted-component')->layout('layouts.base');
    }
}
