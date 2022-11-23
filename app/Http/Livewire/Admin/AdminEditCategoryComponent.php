<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $category_id;
    public $scategory_id;
    public $scategory_slug;

    public function mount($slug, $scategory_slug = null)
    {
        if ($scategory_slug) {
            $this->scategory_slug = $scategory_slug;
            $scategory = Subcategory::where('slug', $scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id = $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
        } else {
            $category = Category::where('slug', $slug)->first();
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->postedby = Auth::user()->name;
            $this->category_id = $category->id;
        }
    }
    public function generateSlug()
    {
        $placeObj = new Category();

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
        if ($this->scategory_id) {
            $scategory = Subcategory::find($this->scategory_id);
            $scategory->name = $this->name;
            $scategory->slug  = $this->slug;
            $scategory->category_id  = $this->category_id;
            $scategory->save();
        } else {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug  = $this->slug;
            $category->postedby  = $this->postedby;
            if ($this->newimage) {
                if ($category->image) {
                    unlink('assets/frontend/img' . '/' . $category->image);
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('img', $imageName);
                $category->image = $imageName;
            }
            $category->save();
        }
        session()->flash('message', 'Category updated successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-category/');

        $categories = Category::all();
        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
