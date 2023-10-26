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
        $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        $items = Item::where('menu_id', '=', $menu->id)->where('parent_id', '=', 0)->get();
        return view('content.view_data', compact('menu', 'items', 'randomColor'));
    }

    public function myDataPublic()
    {
        $user = auth()->user();
        $menus = Menu::where('is_public', '=', 1)->where('created_by', '=', $user->id)->get();
        return view('content.view_public', compact('menus'));
    }

    public function myDataPrivate()
    {
        $user = auth()->user();
        $menus = Menu::where('is_public', '=', 0)->where('created_by', '=', $user->id)->get();
        return view('content.view_private', compact('menus'));
    }

    public function showMyData($id)
    {
        $menu = Menu::find($id);
        $items = Item::where('menu_id', '=', $menu->id)->where('parent_id', '=', 0)->get();
        return view('content.view_my_data', compact('menu', 'items'));
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return back()->with('error', 'Menu tidak ditemukan!');
        }

        // Hapus semua child menu
        $menu->item()->delete();

        // Hapus menu
        $menu->delete();

        session()->flash('delete', 'Anda berhasil menghapus menu');

        return back();
    }

    public function updateMenu($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'is_public' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Data tidak valid!');
        }

        $menu = Menu::find($id);

        $menu->title = $request->get('title');
        $menu->is_public = $request->get('is_public') === '1';

        $menu->save();

        session()->flash('update', 'Menu berhasil diperbarui!');

        return back();
    }
}
