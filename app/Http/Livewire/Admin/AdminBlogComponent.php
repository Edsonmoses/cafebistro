<?php

namespace App\Http\Livewire\Admin;

use App\Models\Bcategory;
use App\Models\Blog;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminBlogComponent extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Admin Blog');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/blog');

        $blogs = Blog::all();
        $bcategory = Bcategory::all();
        return view('livewire.admin.admin-blog-component', ['blogs' => $blogs, 'bcategory' => $bcategory])->layout('layouts.base');
    }
}
