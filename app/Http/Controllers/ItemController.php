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
        $items = Item::where('parent_id', '=', 0)->get();
        $allitems = Item::pluck('title', 'id', 'content1', 'content2', 'menu_id')->all();

        return view('menu.menuTreeview', compact('items', 'allitems'));
    }

    public function store(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required',
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
        return view('menu.dynamicMenu', compact('items'));
    }
}
