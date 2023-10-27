<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $items = Item::where('menu_id', '=', $menu->id)->where('parent_id', '=', 0)->get();
        $allItems = Item::where('menu_id', '=', $menu->id)->get();
        return view('content.item.index', compact('items', 'menu', 'allItems'));
    }

    public function store(Request $request,)
    {
        $menu = session('new_menu');

        $request->validate([
            'title' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $input['menu_id'] = $menu->id;
        Item::create($input);
        return back()->with('success', 'Menu added successfully.');
    }

    public function updateItem($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Data tidak valid!');
        }

        $item = Item::find($id);

        $item->title = $request->get('title');
        $item->content1 = $request->get('content1');
        $item->content2 = $request->get('content2');

        $item->save();

        session()->flash('update', 'Item berhasil diperbarui!');

        return back();
    }

    public function editModal($id)
    {
        $item = Item::find($id);
        return view('content.modal_list_item', compact('item'));
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return back()->with('error', 'item tidak ditemukan!');
        }

        $children = $item->childs;
        foreach ($children as $child) {
            $child->delete();
        }

        $item->delete();

        session()->flash('delete', 'Anda berhasil menghapus item');

        return back();
    }

    public function addItemView($id)
    {
        $menu = Menu::find($id);
        $items = Item::where('menu_id', '=', $menu->id)->where('parent_id', '=', 0)->get();
        $allItems = Item::where('menu_id', '=', $menu->id)->get();
        return view('content.item.add_item', compact('items', 'menu', 'allItems'));
    }

    public function addItem($id, Request $request)
    {
        $menu = Menu::find($id);

        $request->validate([
            'title' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        $input['menu_id'] = $menu->id;
        Item::create($input);
        return back()->with('success', 'Menu added successfully.');
    }
}
