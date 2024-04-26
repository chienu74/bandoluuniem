<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MenuView extends Component
{
    public $menus;

    public function __construct()
    {
        $this->menus = Menu::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.menu-view');
    }
}
