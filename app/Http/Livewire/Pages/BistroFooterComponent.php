<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use App\Models\Page;
use Livewire\Component;

class BistroFooterComponent extends Component
{
    public function render()
    {
        $aboutus = Page::where('status', 1)->get();
        $posts = Blog::where('status', 1)->orderBy('name', 'desc')->first()->limit(2)->get();
        return view('livewire.pages.bistro-footer-component', ['aboutus' => $aboutus, 'posts' => $posts]);
    }
}
