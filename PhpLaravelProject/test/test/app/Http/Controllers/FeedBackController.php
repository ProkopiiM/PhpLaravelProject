<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackRequest;
use App\Models\feedbackmodel;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        return view('FeedBackForm');
    }
    public function store(FeedBackRequest $request)
    {
        $validation = $request->validated();
        feedbackmodel::create($validation);
        return redirect()->route('feedback.index');
    }
}
