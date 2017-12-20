<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //just a new a new controller

    public function about(){
        $firstname = 'Manjit';
        $lastname = 'Kumar';
        
        return view('pages.about', compact('firstname' , 'lastname') );
    }

    public function contact(){

        return view('pages.contact');
    }
    
}