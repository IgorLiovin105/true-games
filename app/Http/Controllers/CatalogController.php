<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    // Catalog index
    public function index()
    {
        $products = Product::where('quantity', '>', 0)->get();
        $categories = Category::all();
        return view('pages.index', compact('products', 'categories'));
    }

    // Category page
    public function category($id)
    {
        $products = Product::where('quantity', '>', 0)->where('category_id', $id)->get();
        $categories = Category::all();
        return view('pages.index', compact('products', 'categories'));
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
        $cartItems = Cart::where('user_id', auth()->user()->id)->where('status', 'added')->get();
        $price = $cartItems->sum('summary_price');
        return view('pages.cart', compact(['cartItems', 'price']));
    }

    // Add to cart method
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        if($product->quantity < 1) {
            return response()->json(['message' => 'Вы не можете добавить данный товар в коризну, так как его нет в наличии'], 200);
        }
        if($cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->where('status', 'added')->first()) {
            $cart->quantity++;
            $cart->summary_price = $cart->quantity * $product->price;
            $cart->save();
        }
        else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->id,
                'summary_price' => Product::find($request->id)->price,
                'quantity' => 1
            ]);
        }

        $product->quantity--;
        $product->save();

        $cartCount = Cart::where('user_id', auth()->user()->id)->where('status', 'added')->count();

        return response()->json(['message' => 'Товар добавлен в коризну', 'productQuantity' => $product->quantity, 'cartQuantity' => $cartCount], 200);
    }

    // Change quantity method
    public function changeQuantity($id, $method)
    {
        $cart = Cart::find($id);
        if($method == 'incr' && $cart->product->quantity > 0) {
            $cart->quantity++;
            $cart->product->quantity--;
            $cart->summary_price = $cart->product->price * $cart->quantity;
            $cart->product->save();
            $cart->save();
        }

        if($method == 'decr' && $cart->quantity > 1) {
            $cart->quantity--;
            $cart->product->quantity++;
            $cart->summary_price = $cart->product->price * $cart->quantity;
            $cart->product->save();
            $cart->save();
        }
        return back();
    }

    // Delete from cart
    public function deleteFromCart($id)
    {
        $cart = Cart::find($id);
        $cart->product->quantity += $cart->quantity;
        $cart->product->save();
        Cart::destroy($id);
        return back();
    }
}
