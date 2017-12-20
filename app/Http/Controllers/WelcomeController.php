<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //default or root controller 
    public function index(){
        return view('welcome');
    }
}
