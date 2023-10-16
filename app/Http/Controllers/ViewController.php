<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function viewPublic()
    {
        return view('content.view_public');
    }
    public function viewPrivate()
    {
        return view('content.view_private');
    }
}
