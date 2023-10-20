<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_public', '=', 1)->get();
        return view('content.data_home', compact('menus'));
    }

    public function viewCreateMenu()
    {
        return view('content.add_data');
    }

    public function createMenu(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'is_public' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Alamat email telah terdaftar!');
        }

        $menu = Menu::create([
            'title' => $request->get('title'),
            'is_public' => $request->get('is_public') === '1',
            'created_by' => auth()->user()->id,
            'created_by_name' => auth()->user()->name,
        ]);

        session(['new_menu' => $menu]);

        return redirect('/create-item')->with('success', 'Anda berhasil menambahkan data');
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        $items = Item::where('menu_id', '=', $menu->id)->where('parent_id', '=', 0)->get();
        return view('content.view_data', compact('menu', 'items'));
    }
}
