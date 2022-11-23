<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Models\Pcategory;
use Carbon\Carbon;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminAddPageComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $slug;
    public $title;
    public $body;
    public $image;
    public $signature;
    public $pcategory_id;
    public $postedby;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->pcategory_id = '0';
    }
    public function generateslug()
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $slugNameURL = strtolower($final_slug);
        $this->slug = Str::slug($slugNameURL);
    }
    public function addPage()
    {
        if ($this->signature) {
            $page = new Page();
            $page->name = $this->name;
            $page->slug  = $this->slug;
            $page->title  = $this->title;
            $page->body = $this->body;
            $page->postedby  = $this->postedby;
            $page->pcategory_id  = $this->pcategory_id;
            $imageName = Carbon::now()->timestamp . '.' . $this->signature->extension();
            $this->signature->storeAs('img', $imageName);
            $page->signature = $imageName;
            if ($this->image) {
                $imagesname = '';
                foreach ($this->image as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('img', $imgName);
                    $imagesname = $imagesname . ',' . $imgName;
                }
                $page->image =  $imagesname;
            }
            $page->save();
        } else {
            $page = new Page();
            $page->name = $this->name;
            $page->slug  = $this->slug;
            $page->title  = $this->title;
            $page->body = $this->body;
            $page->postedby  = $this->postedby;
            if ($this->image) {
                $imagesname = '';
                foreach ($this->image as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('img', $imgName);
                    $imagesname = $imagesname . ',' . $imgName;
                }
                $page->image =  $imagesname;
            }
            $page->save();
        }

        session()->flash('message', 'Page added successfully 😁');
    }


    public function render()
    {
        SEOMeta::setTitle('Admin Add Page');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/add-page');

        $pcategories = Pcategory::where('status', 1)->get();

        return view('livewire.admin.admin-add-page-component', ['pcategories' => $pcategories])->layout('layouts.base');
    }
}
