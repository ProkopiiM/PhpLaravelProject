<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackRequest;
use App\Http\Requests\RequestRequest;
use App\Models\feedbackmodel;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RequestController extends Controller
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
    public function index(Request $request)
    {
        $field = $request->input('sort', 'status');
        $direction = $request->input('direction', 'asc');

        $nameOrEmail = $request->input('nameOrEmail');

        $count = $request->input('count');

        $query = feedbackmodel::orderBy($field, $direction);

        if (!empty($nameOrEmail)) {
            $query->where(function($query) use ($nameOrEmail) {
                $query->where('name', 'like', "%$nameOrEmail%")
                    ->orWhere('email', 'like', "%$nameOrEmail%");
            });
        }

        $requests = $query->paginate($count ?: 25)->withQueryString();

        return view('RequestsBlade/Requests', ['requests' => $requests]);
    }
    public function create()
    {
        return view('RequestsBlade/AddOrRedactRequests', ['request' => null]);
    }
    public function edit($id)
    {
        $request = feedbackmodel::where('id', $id)->first();
        return view('RequestsBlade/AddOrRedactRequests', ['request' => $request]);
    }
    public function store(RequestRequest $request)
    {
        $validator = $request->validated();
        /*$requests = new feedbackmodel();
        $requests->name = $validator["name"];
        $requests->email = $validator["email"];
        $requests->phone = $validator["phone"];
        $requests->message = $validator["message"];
        $requests->status = $validator["status"];
        $requests->save();*/
        feedbackmodel::create($validator);
        return redirect()->route('requests.index');
    }
    public function update(RequestRequest $req, feedbackmodel $request )
    {
        $validate = $req->validated();
        $request->update([
            'name' => $validate["name"],
            'email' => $validate["email"],
            'phone'=> $validate["phone"],
            'message' => $validate["message"],
            'status' => $validate["status"],
        ]);
        return redirect('/requests');
    }

    public function destroy($id)
    {
        $requestdelete = feedbackmodel::find($id);
        $requestdelete->delete();
        return response()->json(['message' => 'Заявка успешно удалена']);
    }


}
