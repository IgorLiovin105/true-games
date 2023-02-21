<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Product;
use App\Models\Category;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createProductPage()
    {
        $categories = Category::all();
        return view('admin.create-product', compact('categories'));
    }

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

    public function deleteProduct($id)
    {
        Product::destroy($id);
        return redirect()->route('main');
    }

    // Repairs in canceling page
    public function repairsPage()
    {
        $repairs = Repair::all();
        return view('admin.repairs', compact('repairs'));
    }

    // Cancel repair page
    public function cancelRepairPage($id)
    {
        $repair = Repair::find($id);
        return view('admin.cancel-repair', compact('repair'));
    }

    // Cancel repair method
    public function cancelRepair(Request $request)
    {
        Repair::where('id', $request->id)->update(['status' => 'Отменён', 'reason' => $request->reason, 'is_canceled' => true]);
        return redirect()->route('repairsPage');
    }
}