<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function detailProfile()
    {
        return view('content.profile');
    }
    public function addData()
    {
        return view('content.add_data');
    }
    public function viewAllDataPublic()
    {
        return view('content.view_data_public');
    }
    public function viewPublic()
    {
        return view('content.view_public');
    }
    public function viewPrivate()
    {
        return view('content.view_private');
    }
}
