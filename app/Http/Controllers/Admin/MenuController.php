<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        $ParentMenus=Menu::select('MenuID','MenuName')->get();
        return view('admins.menu.index',compact('menus', 'ParentMenus'));
    }
    public function create(){
        $menus = Menu::all();
        $ParentMenus = Menu::select('MenuID', 'MenuName')->get();
        return view('admins.menu.create', compact('menus', 'ParentMenus'));
    }
    
}
