<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        return view('confirm');
    }

    public function admin(LoginRequest $request)
    {
        $contents = $request->only(['name','gender','email','subject']);
        return view('admin', compact('contents'));
    }
}
