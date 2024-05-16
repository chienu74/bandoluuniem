<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if (!isset($request->search)) {
            $search = '';
        }
        $Products = DB::table('Product')
            ->join('ProductCategory', 'ProductCategory.ProductCategoryID', '=', 'Product.ProductCategoryID')
            ->select('Product.*', 'ProductCategory.ProductCategoryName')
            ->where('ProductName', 'like', '%' . $search . '%')
            ->paginate(10);
        $Products->appends(['search' => $search]);
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
        // dd($request);
        $imgPath = "";
        if ($request->Image != null) {
            $image = $request->file('Image');
            $imgName = time() . '.png';
            $imgPath = "/image/product/" . $imgName;
            $image->move(public_path('/image/product/'), $imgName);
        }
        $Detail = $request->Detail;
        if ($Detail != "") {
            $dom = new DOMDocument();
            $dom->loadHTML($Detail, 9);
            $body = $dom->getElementsByTagName('body')->item(0);
            $images = $dom->getElementsByTagName('img');
            if ($images->length == 0) {
                foreach ($images as $key => $img) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = "/upload/" . time() . $key . '.png';
                    file_put_contents(public_path() . $image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
                $Detail = $dom->saveHTML($body);
            }
        }
        $data = [
            'ProductCategoryID' => $request->ProductCategoryID,
            'ProductName' => $request->ProductName,
            'Image' => ltrim($imgPath, '/'),
            'Description' => $request->Description,
            'Price' => $request->Price,
            'Detail' => $Detail
        ];
        Product::create($data);
        return redirect('/Admin/Product');
    }
    public function show($ProductID)
    {
        $Products = DB::table('Product')
            ->join('ProductCategory', 'ProductCategory.ProductCategoryID', '=', 'Product.ProductCategoryID')
            ->select('Product.*', 'ProductCategory.ProductCategoryName')
            ->get();
        return view('admins.product.index', compact('Products'));
    }
    public function edit($ProductID)
    {
        $Products = Product::where('ProductID', $ProductID)->first();
        $CategoryProducts = ProductCategory::select('ProductCategoryID', 'ProductCategoryName')->get();
        return view('admins.product.edit', compact('Products', 'CategoryProducts'));
    }
    public function update(Request $request, $ProductID)
    {
        //dd($_POST);
        $imgPath = $request->Image;
        if ($imgPath == null) {
            $imgPath = " ";
        }
        if ($request->Image != null && $request->file('Image') != null) {
            $image = $request->file('Image');
            $imgName = time() . '.png';
            $imgPath = "/image/product/" . $imgName;
            $image->move(public_path('/image/product/'), $imgName);
        }
        $Detail = $request->Detail;
        if ($Detail != "") {
            $dom = new DOMDocument();
            $dom->loadHTML($Detail, 9);
            $body = $dom->getElementsByTagName('body')->item(0);
            $images = $dom->getElementsByTagName('img');
            if ($images->length == 0) {
                foreach ($images as $key => $img) {
                    $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                    $image_name = "/upload/" . time() . $key . '.png';
                    file_put_contents(public_path() . $image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
                $Detail = $dom->saveHTML($body);
            }
        }
        $data = [
            'ProductCategoryID' => $request->ProductCategoryID,
            'ProductName' => $request->ProductName,
            'Image' => $imgPath,
            'Description' => $request->Description,
            'Price' => $request->Price,
            'Detail' => $Detail
        ];
        $Product = Product::where('ProductID', $ProductID)->first();
        $Product->update($data);
        return redirect()->action('Admin\ProductController@index');
    }
    public function destroy($ProductID)
    {
        Product::where('ProductID', $ProductID)->delete();
        return redirect('/Admin/Product');
    }
}
