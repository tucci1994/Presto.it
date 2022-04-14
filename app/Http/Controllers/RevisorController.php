<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }

    public function index(){
        $announcement=Announcement::where('is_accepted', null)
        ->orderBy('created_at', 'desc')
        ->first();
        return view ('home', compact('announcement'));
    }

    private function setAccepted($announcements_id, $value)
    {
        $announcement=Announcement::find($announcements_id);
        $announcement->is_accepted=$value;
        $announcement->save();
        return redirect(route('home'));
    }

    public function accept($announcements_id){
        return $this->setAccepted($announcements_id, true);
    }

    public function reject($announcements_id){
        return $this->setAccepted($announcements_id, false);
    }



}


