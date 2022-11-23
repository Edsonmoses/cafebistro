<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use Livewire\Component;

class BistroFeaturesComponent extends Component
{
    public function render()
    {
        $blogs = Blog::where('bcategory_id', 1)->orderBy('id', 'desc')->latest()->take(3)->get();
        return view('livewire.pages.bistro-features-component', ['blogs' => $blogs]);
    }
}
