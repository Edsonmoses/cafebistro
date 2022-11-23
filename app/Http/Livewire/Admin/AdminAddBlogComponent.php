<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Blog;
use Livewire\Component;
use App\Models\Bcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddBlogComponent extends Component
{
    public $name;
    public $slug;
    public $desc;
    public $image;
    public $postedby;
    public $bcategory_id;

    use WithFileUploads;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->bcategory_id = '0';
    }
    public function generateSlug()
    {
        $placeObj = new Blog();

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

    public function addBlog()
    {
        $blog = new Blog();
        $blog->name = $this->name;
        $blog->slug  = $this->slug;
        $blog->desc = $this->desc;
        $blog->bcategory_id  = $this->bcategory_id;
        $blog->postedby  = $this->postedby;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img', $imageName);
        $blog->image = $imageName;
        $blog->save();
        session()->flash('message', 'Post added successfully 😁');
    }

    public function render()
    {
        SEOMeta::setTitle('Admin Add Post');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-blog/');

        $bcategory = Bcategory::all();
        return view('livewire.admin.admin-add-blog-component', ['bcategory' => $bcategory])->layout('layouts.base');
    }
}
