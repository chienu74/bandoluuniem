<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $ok = "";
        return view('pages.contact', compact('ok'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Contact::create($data);
        $ok = 'ok';
        // return view('pages.contact',compact('ok'));
        return back()->with('ok', $ok);
    }
}
