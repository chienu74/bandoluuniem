<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::all();
        $login = session()->get('login');
        $id = session()->get('id');
        return view('pages.home', compact('menus', 'login', 'id'));
    }
    public function loginView()
    {
        return view('pages.login');
    }
    public function login()
    {
        $email = $_POST['Email'];
        $password = md5($_POST['Password']);
        $check = DB::table('CustomerAccount')->where('Email', $email)->where('Password', $password)->first();
        if (isset($check)) {
            session()->put(['login' => 'ok', 'id' => $check->CustomerAccountID]);
            return Redirect('/');
        }
        return Redirect('/Login');
    }
    public function logout()
    {
        session()->forget(['login', 'id']);
        // session()->flush();
        return Redirect('/');
    }
    public function signupView()
    {
        return view('pages.signup');
    }
    public function signup(Request $request)
    {
        $pass = md5($request->Password);
        $data = [
            'UserName' => $request->UserName,
            'Email' => $request->Email,
            'Password' => $pass,
        ];
        CustomerAccount::create($data);
        return redirect('/Login');
    }
}
