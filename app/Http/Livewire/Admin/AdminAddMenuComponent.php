<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddMenuComponent extends Component
{
    public $name;
    public $slug;
    public $desc;
    public $price;
    public $image;
    public $postedby;
    public $subcategory_id;

    use WithFileUploads;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->category_id = '0';
        $this->status = '1';
    }
    public function generateSlug()
    {
        $placeObj = new Menu();

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

    public function addMenu()
    {
        $menu = new Menu();
        $menu->name = $this->name;
        $menu->slug  = $this->slug;
        $menu->desc = $this->desc;
        $menu->price  = $this->price;
        $menu->subcategory_id  = $this->subcategory_id;
        $menu->postedby  = $this->postedby;
        $menu->status  = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img/menu', $imageName);
        $menu->image = $imageName;
        $menu->save();
        session()->flash('message', 'Item added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Menu');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-menu/');

        $category = Category::all();
        $scategories = Subcategory::all();
        return view('livewire.admin.admin-add-menu-component', ['category' => $category, 'scategories' => $scategories])->layout('layouts.base');
    }
}
