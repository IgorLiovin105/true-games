<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Repair;

class AuthController extends Controller
{
    // Register method
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if($user) {
            auth('web')->login($user);
            return redirect()->route('profile');
        }

        return back();
    }

    // Login method
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if(auth('web')->attempt($data)) {
            return redirect()->route('profile');
        }

        return back();
    }

    // Logout method
    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('main');
    }

    // Profile page
    public function profilePage()
    {
        $repairs = Repair::where('user_id', auth()->user()->id)->where('status', 'Новый')->get();
        return view('pages.profile', compact('repairs'));
    }
}
