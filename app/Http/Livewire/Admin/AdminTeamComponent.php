<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BistroTeam;
use Artesaos\SEOTools\Facades\SEOMeta;

class AdminTeamComponent extends Component
{
    public function deleteteam($id)
    {
        BistroTeam::find($id)->delete();
        session()->flash('message', 'Team Deleted Successfully.');
    }
    public function updateStatus($id)
    {
        $team = BistroTeam::find($id);
        $team->status = '1';
        $team->save();
        session()->flash('message', 'Team activated Successfully.');
    }
    public function dectStatus($id)
    {
        $team = BistroTeam::find($id);
        $team->status = '0';
        $team->save();
        session()->flash('message', 'Team deactivated Successfully.');
    }
    public function render()
    {
        SEOMeta::setTitle('Admin Team');
        SEOMeta::setDescription('BEEF BURGERS. Served with chips or country salad · Classic Burger · Cheese Burger · The Mighty (Double beef, double cheese) · Creamy Mushroom Burger · Sunrise burger');
        SEOMeta::setCanonical('https://www.cafebistro.co.ke/admin/team/');

        $teams = BistroTeam::all();
        return view('livewire.admin.admin-team-component', ['teams' => $teams])->layout('layouts.base');
    }
}
