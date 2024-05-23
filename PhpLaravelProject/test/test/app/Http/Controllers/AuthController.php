<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('LoginPanel');
    }
    public function login(AuthRequest $request)
    {
        $validated = $request->validated();
        $user = usermodel::where('email', $validated['email'])->first();
        if (!empty($user) && $user->status == 1) {
            if (Auth::guard('web')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
                return redirect()->route('MainLayout');
            } else {
                return redirect()->route('login')->with('error', 'Неверный логин или пароль');
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
