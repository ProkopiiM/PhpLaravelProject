<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\feedbackmodel;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
   /* public function __construct()
    {
        $user = usermodel::where('id', Auth::id())->first();
        if (!$user->status)
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }*/
    public function MainLayout()
    {
        return view('MainLayout');
    }

}
