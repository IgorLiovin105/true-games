<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createProduct(Request $request)
    {
        $imgName = time() . $request->img;
        $img = $request->img->move(public_path('img/') . $imgName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $imgName,
            'country' => $request->country,
            'model' => $request->model,
            'year' => $request->year,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('index');
    }
}
