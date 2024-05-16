<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('*')->paginate(8);
        return view('pages.product', compact('products'));
    }
    public function detail(Request $request)
    {
        $ProductID = $request['ProductID'];
        $detail = Product::where('ProductID', '=', $ProductID)->first();

        return view('pages.productDetail', compact('detail'));
    }
    public function cart()
    {
        $cartItems = $this->getCartItems();
        $productDetails = [];
        $tien = 0;
        $login = session()->get('login');
        // dd($login);
        foreach ($cartItems as $item) {
            $product = Product::select('*', DB::raw($item['Quantity'] . ' as Quantity'))
                ->where('ProductID', $item['ProductID'])
                ->first();

            $tien += $product->Price * $product->Quantity;
            if ($product) {
                $productDetails[] = $product;
            }
        }
        // dd($productDetails);
        return view('pages.cart', compact('cartItems', 'productDetails', 'tien', 'login'));
    }
    public function add(Request $request)
    {
        $productId = $request->input('ProductID');
        $quantity = $request->input('Quantity');

        $cartItems = $this->getCartItems();
        foreach ($cartItems as $key => $item) {
            if ($item['ProductID'] == $productId) {
                $cartItems[$key]['Quantity'] += $quantity; // Tăng số lượng sản phẩm nếu đã tồn tại
                $this->updateCartItems($cartItems);
                return redirect('cart');
            }
        }
        $cartItems[] = [
            'ProductID' => $productId,
            'Quantity' => $quantity,
        ];

        $this->updateCartItems($cartItems);

        return redirect('cart');
    }

    private function getCartItems()
    {
        $cart = Cookie::get('cart');

        if ($cart) {
            return json_decode($cart, true);
        }

        return [];
    }

    private function updateCartItems($cartItems)
    {
        // dd($cartItems, 'hi');


        $cart = json_encode($cartItems);
        Cookie::queue('cart', $cart, 60 * 24 * 7);
    }


    public function order()
    {
        Cookie::queue(Cookie::forget('cart'));
        return redirect('/cart');
    }
}
