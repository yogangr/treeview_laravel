<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::where('parent_id', '=', 0)->get();
        $response = response()->json($items);
        return $response;
    }

    public function indexView()
    {
        $menu = session('new_menu');
        $items = Item::where('parent_id', '=', 0)->get();

        return view('content.item.index', compact('items', 'menu'));
    }

    public function store(Request $request,)
    {
        $request->validate([
            'title' => 'required',
            'content1' => 'required',
            'content2' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Item::create($input);
        return back()->with('success', 'Menu added successfully.');
    }

    public function storeView()
    {
        return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $items = Item::where('parent_id', '=', 0)->get();
        return view('content.menu.dynamicMenu', compact('items'));
    }
}
