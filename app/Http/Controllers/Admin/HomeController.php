<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Contact;
use App\Models\AdminAccount;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productCount = Product::count();
        $productCategoryCount = ProductCategory::count();
        $contactCount = Contact::count();
        return view('admins.home', compact('productCount', 'productCategoryCount', 'contactCount'));
    }

    public function loginView()
    {
        // $vcl = session()->get('login');
        return view('admins.login');
    }
    public function login()
    {
        $email = $_POST['Email'];
        $password = md5($_POST['Password']);
        $check = DB::table('AdminAccount')->where('Email', $email)->where('Password', $password)->first();
        if (isset($check)) {
            session()->put(['adminlogin' => 'ok', 'adminid' => $check->AdminAccountID]);
            return Redirect('/Admin');
        }
        $mess = "Sai Email hoặc Mật khẩu";
        return view('admins.login', compact('mess'));

        // return redirect('/Admin/Login')->with('mess', $mess);
    }
    public function logout()
    {
        session()->forget(['adminlogin', 'adminid']);
        // session()->flush();
        return Redirect('/Admin/Login');
    }

    public function signupView()
    {
        return view('admins.signup');
    }
    public function signup(Request $request)
    {
        // dd($request->Email);
        $pass = md5($request->Password);
        $data = [
            'Email' => $request->Email,
            'UserName' => $request->UserName,
            'Password' => $pass,
        ];
        // dd($data);
        AdminAccount::create($data);
        return redirect('Admin/Login');
    }
}
