<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title2 = 'Welcome to the login demo';
        $title = 'Welcome to Laravel Blog';
        #return view('pages.index', compact('title', 'title2'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
