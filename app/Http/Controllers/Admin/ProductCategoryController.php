<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

//use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if (!isset($request->search)) {
            $search = '';
        }
        $ProductCategorys = ProductCategory::where('ProductCategoryName', 'like', '%' . $search . '%')
            ->paginate(10);
        $ProductCategorys->appends(['search' => $search]);
        return view('admins.productCategory.index', compact('ProductCategorys'));
    }
    public function create()
    {
        return view('admins.productCategory.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        ProductCategory::create($data);
        return redirect('/Admin/ProductCategory');
    }
    public function show($ProductCategoryID)
    {
        $ProductCategorys = ProductCategory::all();
        return view('admins.productCategory.index', compact('ProductCategorys'));
    }
    public function edit($ProductCategoryID)
    {
        $ProductCategorys = ProductCategory::where('ProductCategoryID', $ProductCategoryID)->first();
        return view('admins.productCategory.edit', compact('ProductCategorys'));
    }
    public function update(Request $request, $ProductCategoryID)
    {
        $ProductCategory = ProductCategory::where('ProductCategoryID', $ProductCategoryID)->first();
        $update = $request->all();
        $ProductCategory->update($update);
        return redirect()->action('Admin\ProductCategoryController@index');
    }
    public function destroy($ProductCategoryID)
    {
        Product::where('ProductCategoryID', $ProductCategoryID)->delete();
        ProductCategory::where('ProductCategoryID', $ProductCategoryID)->delete();
        return redirect('/Admin/ProductCategory');
    }
}
