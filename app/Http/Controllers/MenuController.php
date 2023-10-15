<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show()
    {
        $menus = Menu::where('is_public', '=', 1)->get();
        return view('content.data_home', compact('menus'));
    }

    public function viewCreateMenu()
    {
        return view('content.add_data');
    }
}
