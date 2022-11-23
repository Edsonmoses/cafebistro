<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Pagesetting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\WithPagination;

class BistoBlogComponent extends Component
{
    use WithPagination;

    public function render()
    {
        SEOMeta::setTitle('Blog');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/blog');

        $blogs = Blog::orderBy('name', 'DESC')->paginate(6);
        $psetting = Pagesetting::all();
        return view('livewire.pages.bisto-blog-component', ['psetting' => $psetting, 'blogs' => $blogs])->layout('layouts.base');
    }
}
