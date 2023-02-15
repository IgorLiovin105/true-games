<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    // Catalog index
    public function index()
    {
        $products = Product::all();
        return view('pages.index', compact('products'));
    }

    // Catalog detail
    public function detail($id)
    {
        $product = Product::find($id);
        return view('pages.detail', compact('product'));
    }

    // Cart page
    public function cart()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $finalPrice = 0;
        foreach($cartItems as $item) {
            $finalPrice += $item->product->price;
        }
        return view('pages.cart', compact(['cartItems', 'finalPrice']));
    }

    // Add to cart method
    public function addToCart(Request $request)
    {
        if(Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->count() > 0) {
            return response()->json(['message' => 'Данный товар уже был добавлен в коризну', 'status' => 405]);
        }

        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->id
        ]);

        $product = Product::find($request->id);
        $product->quantity--;
        $product->save();

        $cart = cart::where('user_id', auth()->user()->id)->count();

        return response()->json(['message' => 'Товар добавлен в коризну', 'productQuantity' => $product->quantity, 'cartQuantity' => $cart], 200);
    }
}
