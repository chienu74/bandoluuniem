<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $ParentMenus = Menu::select('MenuID', 'MenuName')->get();
        return view('admins.menu.index', compact('menus', 'ParentMenus'));
    }
    public function create()
    {
        $menus = Menu::all();
        $ParentMenus = Menu::select('MenuID', 'MenuName')->get();
        return view('admins.menu.create', compact('menus', 'ParentMenus'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Menu::create($data);
        return redirect('/Admin/Menu');
    }
    public function show($MenuID)
    {
        $menus = Menu::all();
        $ParentMenus = Menu::select('MenuID', 'MenuName')->get();
        return view('admins.menu.index', compact('menus', 'ParentMenus'));
    }
    public function edit($MenuID)
    {
        $menus = Menu::where('MenuID', $MenuID)->first();
        $ParentMenus = Menu::select('MenuID', 'MenuName')
        ->whereNotIn('MenuID',[$MenuID])
        ->get();
        return view('admins.menu.edit', compact('menus', 'ParentMenus'));
    }
    public function update(Request $request, $MenuID)
    {
        $menu = Menu::where('MenuID', $MenuID)->first();
        $update = $request->all();
        $menu->update($update);
        return redirect()->action('Admin\MenuController@index');
    }
    public function destroy($MenuID)
    {
        Menu::where('MenuID', $MenuID)->delete();
        return redirect('/Admin/Menu');
    }
}