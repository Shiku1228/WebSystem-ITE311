<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home'); 
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function templateExample()
    {
        return view('templates/example_page');
    }
}
