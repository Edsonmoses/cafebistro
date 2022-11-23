<?php

namespace App\Http\Livewire\Pages;

use App\Models\Bcategory;
use App\Models\Blog;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class BistoBlogSingleImageComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        SEOMeta::setTitle('Single Blog');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/blog-single-image');



        $blogs = Blog::where('slug', $this->slug)->orderBy('name', 'ASC')->first();
        $related_blogs = Blog::where('bcategory_id', [$blogs->bcategory_id])->inRandomOrder()->limit(5)->get();
        $categories = Bcategory::orderBy('name', 'DESC')->limit(5)->get();
        $r_blogs = Blog::orderBy('name', 'DESC')->limit(5)->get();
        return view('livewire.pages.bisto-blog-single-image-component', ['blogs' => $blogs, 'related_blogs' => $related_blogs, 'categories' => $categories, 'r_blogs' => $r_blogs])->layout('layouts.base');
    }
}
