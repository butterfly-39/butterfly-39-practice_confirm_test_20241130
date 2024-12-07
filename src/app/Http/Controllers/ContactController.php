<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\LoginRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'inquiry_type', 'inquiry_content']);
        $contact['tel'] = $tel; // 結合した電話番号を追加
        return view('confirm', compact('contact'));
    }

}
