<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\BistroTeam;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminAddTeamComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $position;
    public $social;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
        $this->status = '1';
    }
    public function generateSlug()
    {
        $placeObj = new BistroTeam();

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

    public function addTeam()
    {
        $team = new BistroTeam();
        $team->name = $this->name;
        $team->slug  = $this->slug;
        $team->position  = $this->position;
        $team->social  = $this->social;
        $team->postedby  = $this->postedby;
        $team->status  = $this->status;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('img/team', $imageName);
        $team->image = $imageName;
        $team->save();
        session()->flash('message', 'Team added successfully 😁');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Add Team');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/team/');

        return view('livewire.admin.admin-add-team-component')->layout('layouts.base');
    }
}
