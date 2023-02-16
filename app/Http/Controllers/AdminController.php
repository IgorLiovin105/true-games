<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createProduct(Request $request)
    {
        $data = $request->validate([
			'name' => 'required|string',
			'img' => 'required|image|mimes:png,jpeg,jpg,svg',
			'description' => 'required|string',
			'model' => 'required',
			'country' => 'required',
			'year' => 'required',
			'price' => 'required',
			'quantity' => 'required',
			'category_id' => 'required',
		]);

        $imgName = time() . '-' . $request->img->getClientOriginalName();
        $request->img->move(public_path('img'), $imgName);

        Product::create([
            'name' => $data['name'],
            'img' => $imgName,
            'description' => $data['description'],
            'model' => $data['model'],
            'country' => $data['country'],
            'year' => $data['year'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('main');
    }
}
