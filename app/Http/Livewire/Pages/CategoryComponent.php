<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Bcategory;
use Artesaos\SEOTools\Facades\SEOMeta;

class CategoryComponent extends Component
{
    public $category_slug;
    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        SEOMeta::setTitle('Blog Category');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/blog-single-image');

        $category = Bcategory::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if ($this->sorting == 'date') {
            $blogs = Blog::where('bcategory_id', $category_id)->orderBy('created_at', 'DESC')->get();
        } elseif ($this->sorting == 'price') {
            $blogs = Blog::where('bcategory_id', $category_id)->orderBy('created_at', 'DESC')->get();
        } elseif ($this->sorting == 'price') {
            $blogs = Blog::where('bcategory_id', $category_id)->orderBy('created_at', 'DESC')->get();
        } else {
            if ($category_id) {
                $blogs = Blog::where('bcategory_id', $category_id)->get();
            }
        }

        $related_blogs = Blog::where('bcategory_id', [$blogs->bcategory_id])->inRandomOrder()->limit(5)->get();
        $categories = Bcategory::orderBy('name', 'DESC')->limit(5)->get();
        $r_blogs = Blog::orderBy('name', 'DESC')->limit(5)->get();
        return view('livewire.pages.category-component', ['blogs' => $blogs, 'related_blogs' => $related_blogs, 'categories' => $categories, 'r_blogs' => $r_blogs, 'category_name' => $category_name])->layout('layouts.base');
    }
}
