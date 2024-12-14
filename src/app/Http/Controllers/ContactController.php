<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

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

    public function store(Request $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3; // 電話番号を結合
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'inquiry_type', 'inquiry_content']); // 必要なデータを取得
        $contact['tel'] = $tel; // 結合した電話番号を追加
        $gender_map = [
            '男性' => 1,
            '女性' => 2,
            'その他' => 3,
        ];
        $contact['gender'] = $gender_map[$request->input('gender')]; // 性別を数値に変換
        Contact::create($contact); // データベースに保存
        return view('thanks', compact('contact')); // 画面に渡すデータ（確認画面等）
    }

    public function test()
    {
        return view('test');
    }

}
