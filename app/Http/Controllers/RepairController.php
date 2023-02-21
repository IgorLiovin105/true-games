<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Repair;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class RepairController extends Controller
{
    // Make Repair Method
    public function makeRepair(LoginRequest $request)
    {
        $data = $request->validated();

        if(auth('web')->attempt($data)) {
            $cartItems = Cart::where('user_id', auth()->user()->id)->where('status', 'added')->get();
            $repair = Repair::create([
                'user_id' => auth()->user()->id,
                'price' => $cartItems->sum('summary_price')
            ]);

            Cart::where('user_id', auth()->user()->id)->where('status', 'added')->update(['status' => 'formed', 'repair_id' => $repair->id]);
            return redirect()->route('profile');
        }

        return back();
    }

    // Repair page
    public function repair($id)
    {
        $repairItems = Cart::where('repair_id', $id)->get();
        $repairNumber = Repair::find($id);
        return view('pages.repair', compact('repairItems', 'repairNumber'));
    }

    // Cancel repair method
    public function cancelRepair(Request $request)
    {
        Repair::where('id', $request->id)->update(['status' => 'Ждёт отмены']);
        return redirect()->route('profile');
    }
}
