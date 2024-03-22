<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$menu = Menu::all();
        //return view('admins.home')->with('menus', $menu);
        //$menu =Menu::all();
        // foreach($menu as $p){
        //     echo $p->MenuID;
        //     echo $p->MenuName;
        // }
        return view('admins.home');
    }
}
