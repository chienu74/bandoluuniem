<?php

namespace App\View\Components;

use App\Models\AdminAccount;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\AdminMenu;

class MenuViewAdmin extends Component
{
    public $menus;
    public $user;
    public $login;
    public $id;
    public function __construct()
    {
        $this->menus = AdminMenu::all();
        $this->id = session()->get('adminid');
        $this->user = AdminAccount::where('AdminAccountID', '=', $this->id)->first();

        $this->login = session()->get('adminlogin');
    }
    public function render(): View|Closure|string
    {
        return view('components.menu-view-admin');
    }
}
