<?php

namespace App\Http\Controllers;

use App\Mail\adminmail;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function welcome(){
        $announcements = Announcement::where('is_accepted', true)->orderBy("created_at", "desc")->take(6)->get();
        return view ("welcome", compact("announcements") );
    }

    public function form(){
        return view ("form");
    }

    public function detail(Announcement $announcement){
        return view("detailAnnouncement", compact("announcement"));
    }

    public function filter($name,$category_id){
        $category=Category::find($category_id);
        $announcements=$category->announcement()->paginate(5);
        return view("categoryFilter", compact("category", "announcements"));
    }

    public function announcementsByCategory($name, $category_id){
        $category=Category::find($category_id);
        $announcements=$category->announcements()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('announcements', compact('category', 'announcements'));
    }

    public function search(Request $request){
         $q = $request->input('q');
         $announcements = Announcement::search($q)->get();
         return view('search_result' , compact('q' , 'announcements'));
    }

    public function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

    // funzione per diventare revisore

    public function contact(){
        return view("contact");
    }


    public function submit(Request $request){
        //    dd($request->all());
        $email= $request-> input("email");
        $name= $request-> input("name");
        $message= $request-> input("message");

        $contact= compact("name", "message");
        $admin= compact("email", "name", "message");

        Mail::to($email)->send(new contactmail($contact));
        Mail::to("admin@gmail.com")->send(new adminmail($admin));

        return redirect(route('contact'))->with('message', "La tua richiesta è stata presa in carico");
    }


     
}
