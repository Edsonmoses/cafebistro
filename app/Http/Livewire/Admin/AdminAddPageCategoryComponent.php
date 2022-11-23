<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddPageCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $pcategory_id;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->status = '1';
    }
    public function generateSlug()
    {
        $placeObj = new Pcategory();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $categoryNameURL = strtolower($final_slug);
        $this->slug = Str::slug($categoryNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($categoryNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $categoryNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $categoryNameURL;
        }
    }

    public function addPcategory()
    {
        $pcategory = new Pcategory();
        $pcategory->name = $this->name;
        $pcategory->slug  = $this->slug;
        $pcategory->pcategory_id  = $this->pcategory_id;
        $pcategory->postedby  = $this->postedby;
        $pcategory->status  = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img', $imageName);
        $pcategory->image = $imageName;
        $pcategory->save();
        session()->flash('message', 'Page Category added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Page Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-category/');

        $pcategories = Pcategory::all();
        return view('livewire.admin.admin-add-page-category-component', ['pcategories' => $pcategories])->layout('layouts.base');
    }
}
