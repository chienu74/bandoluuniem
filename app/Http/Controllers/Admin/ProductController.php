<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $Products = Product::all();
        // $CategoryProducts = ProductCategory::select('ProductCategoryID', 'ProductCategoryName')->get();

        $Products = DB::table('Product')
            ->join('ProductCategory', 'ProductCategory.ProductCategoryID', '=', 'Product.ProductCategoryID')
            ->select('Product.*', 'ProductCategory.ProductCategoryName')
            ->get();
        return view('admins.product.index', compact('Products'));
    }
    public function create()
    {
        $Products = Product::all();
        $CategoryProducts = ProductCategory::select('ProductCategoryID', 'ProductCategoryName')->get();
        return view('admins.product.create', compact('Products', 'CategoryProducts'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);
        return redirect('/Dashboard/Product');
    }
    // public function show($ProductID)
    // {
    //     return "ok show";
    // }
    // public function edit($ProductID)
    // {
    //     $Products = Product::where('ProductID', $ProductID)->first();
    //     $ParentProducts = Product::select('ProductID', 'ProductName')->get();
    //     return view('admins.product.edit', compact('Products', 'ParentProducts'));
    // }
    // public function update(Request $request, $ProductID)
    // {
    //     $Product = Product::where('ProductID', $ProductID)->first();
    //     $update = $request->all();
    //     $Product->update($update);
    //     return redirect()->action('Admin\ProductController@index');
    // }
    // public function destroy($ProductID)
    // {
    //     Product::where('ProductID', $ProductID)->delete();
    //     return redirect('/Dashboard/Product');
    // }
}
