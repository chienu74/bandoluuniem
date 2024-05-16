<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MenuView extends Component
{
    public $menus;
    public $login;
    public $id;

    public function __construct()
    {
        $this->menus = Menu::all();
        $this->login = session()->get('login');
        $this->id = session()->get('id');
    }

    public function render(): View|Closure|string
    {
        return view('components.menu-view');
    }
}
