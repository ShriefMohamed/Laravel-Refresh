<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index')->with('title', 'Welcome!!');
    }

    public function about() {
        return view('pages.about')->with('title', 'About!!');
    }

    public function services() {
        return view('pages.services')->with(['title' => 'Services!!', 'services' => ['Service 1', 'Service 2', 'Service 3']]);
    }
}
