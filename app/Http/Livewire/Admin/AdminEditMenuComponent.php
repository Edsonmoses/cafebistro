<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminEditMenuComponent extends Component
{
    public $name;
    public $slug;
    public $desc;
    public $price;
    public $image;
    public $newimage;
    public $postedby;
    public $subcategory_id;

    use WithFileUploads;

    public function mount($slug)
    {
        $menu = menu::where('slug', $slug)->first();
        $this->name = $menu->name;
        $this->slug = $menu->slug;
        $this->desc = $menu->desc;
        $this->price = $menu->price;
        $this->image = $menu->image;
        $this->subcategory_id = $menu->subcategory_id;
        $this->postedby = Auth::user()->name;
        $this->menu_id = $menu->id;
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

    public function updateMenu()
    {
        $menu = Menu::find($this->menu_id);
        $menu->name = $this->name;
        $menu->slug  = $this->slug;
        $menu->desc = $this->desc;
        $menu->price  = $this->price;
        $menu->subcategory_id  = $this->subcategory_id;
        if ($this->newimage) {
            if ($menu->image) {
                unlink('assets/frontend/img/menu' . '/' . $menu->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('img/menu', $imageName);
            $menu->image = $imageName;
        }
        $menu->save();
        session()->flash('message', 'Item updated successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Post');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-menu/');

        $category = Category::all();
        $scategories = Subcategory::all();
        return view('livewire.admin.admin-edit-menu-component', ['category' => $category, 'scategories' => $scategories])->layout('layouts.base');
    }
}
