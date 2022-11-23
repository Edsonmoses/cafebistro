<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Pcategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminEditPageComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $slug;
    public $title;
    public $body;
    public $image;
    public $newimage;
    public $signature;
    public $newsignature;
    public $postedby;
    public $pcategory_id;

    public function mount($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $this->name = $page->name;
        $this->slug = $page->slug;
        $this->title = $page->title;
        $this->body = $page->body;
        $this->image = $page->image;
        $this->signature = $page->signature;
        $this->pcategory_id = $page->pcategory_id;
        $this->postedby = Auth::user()->name;
        $this->page_id = $page->id;
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
            $page = Page::find($this->page_id);
            $page->name = $this->name;
            $page->slug  = $this->slug;
            $page->title  = $this->title;
            $page->body = $this->body;
            $page->pcategory_id = $this->pcategory_id;
            if ($this->newsignature) {
                if ($page->signature) {
                    unlink('assets/frontend/img' . '/' . $page->signature);
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newsignature->extension();
                $this->newsignature->storeAs('img', $imageName);
                $page->signature = $imageName;
            }
            if ($this->newimage) {
                if ($page->image) {
                    $images = explode(",", $page->image);
                    foreach ($images as $image) {
                        if ($image) {
                            unlink('assets/frontend/img' . '/' . $image);
                        }
                    }
                }
                $imagesname = '';
                foreach ($this->newimage as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('img', $imgName);
                    $imagesname = $imagesname . ',' . $imgName;
                }
                $page->image =  $imagesname;
            }
            $page->save();
        } else {
            $page = Page::find($this->page_id);
            $page->name = $this->name;
            $page->slug  = $this->slug;
            $page->title  = $this->title;
            $page->body = $this->body;
            $page->pcategory_id = $this->pcategory_id;
            if ($this->newimage) {
                if ($page->image) {
                    $images = explode(",", $page->image);
                    foreach ($images as $image) {
                        if ($image) {
                            unlink('assets/frontend/img' . '/' . $image);
                        }
                    }
                }
                $imagesname = '';
                foreach ($this->newimage as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('img', $imgName);
                    $imagesname = $imagesname . ',' . $imgName;
                }
                $page->image =  $imagesname;
            }
            $page->save();
        }
        session()->flash('message', 'Page updated successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Edit Page');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/edit-page/');

        $pcategories = Pcategory::where('status', 1)->get();
        return view('livewire.admin.admin-edit-page-component', ['pcategories' => $pcategories])->layout('layouts.base');
    }
}
