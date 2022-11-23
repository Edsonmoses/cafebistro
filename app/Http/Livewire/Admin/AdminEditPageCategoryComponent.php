<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Pcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminEditPageCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $pcategory_id;

    public function mount($slug)
    {
        $pcategory = Pcategory::where('slug', $slug)->first();
        $this->name = $pcategory->name;
        $this->slug = $pcategory->slug;
        $this->image = $pcategory->image;
        $this->pcategory_id = $pcategory->pcategory_id;
        $this->postedby = Auth::user()->name;
        $this->category_id = $pcategory->id;
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

    public function updateCategory()
    {

        $pcategory = Pcategory::find($this->category_id);
        $pcategory->name = $this->name;
        $pcategory->slug  = $this->slug;
        $pcategory->pcategory_id = $this->pcategory_id;
        if ($this->newimage) {
            if ($pcategory->image) {
                unlink('assets/frontend/img' . '/' . $pcategory->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('img', $imageName);
            $pcategory->image = $imageName;
        }
        $pcategory->save();
        session()->flash('message', 'Page Category updated successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Page Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-category/');

        $pcategories = Pcategory::all();
        return view('livewire.admin.admin-edit-page-category-component', ['pcategories' => $pcategories])->layout('layouts.base');
    }
}
