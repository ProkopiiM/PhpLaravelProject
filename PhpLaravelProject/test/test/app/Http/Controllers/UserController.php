<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /*public function __construct()
    {
        $user = usermodel::where('id', Auth::id())->first();
        if (!$user->status)
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }*/
    public function index(Request $requests)
    {
        $field = $requests->input('sort', 'status');
        $direction = $requests->input('direction', 'asc');

        $nameOrEmail = $requests->input('nameOrEmail');

        $count = $requests->input('count');
        $query = usermodel::orderBy($field, $direction);
        if (!empty($nameOrEmail)) {
            $query->where(function($query) use ($nameOrEmail) {
                $query->where('name', 'like', "%$nameOrEmail%")
                    ->orWhere('email', 'like', "%$nameOrEmail%");
            });
        }

        $request = $query->paginate($count ?: 25)->withQueryString();
        return view('UsersBlade/Users', ['users' => $request]);
    }
    public function destroy($id)
    {
        $userToDelete = usermodel::find($id);
        $userToDelete->delete();
        return response()->json(['message' => 'Пользователь успешно удален']);
    }
    public function create()
    {
        return view('UsersBlade/AddOrRedactUser', ['users' => null]);
    }
    public function edit($id)
    {
        $users = usermodel::where('id', $id)->first();
        return view('UsersBlade/AddOrRedactUser', ['users' => $users]);
    }
    public function store(UserRequest $request)
    {
        $validator = $request->validated();
        usermodel::create($validator);
        return redirect()->route('users.index');
    }
    public function update(UserRequest $request, usermodel $user)
    {
        if ($request->input('password') == null) {
            $validator = $request->validated();
            $user->update([
                'name' => $validator['name'],
                'email' => $validator['email'],
                'status' => $validator['status'],
                'dateredact' => now(),
            ]);
        } else {
            $validator = $request->validated();
            $user->update([
                'name' => $validator['name'],
                'email' => $validator['email'],
                'password' => $validator['password'],
                'status' => $validator['status'],
                'dateredact' => now(),
            ]);
        }
        return redirect()->route('users.index');
    }
}
