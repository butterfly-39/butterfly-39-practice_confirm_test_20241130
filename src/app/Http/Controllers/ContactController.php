<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tel'] = $tel; // 結合した電話番号を追加
        $category = Category::find($request->category_id); // idを使用して対象のデータを取得
        return view('confirm', compact('contact','category'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail','tel']); // 必要なデータを取得
        $gender_map = [
            '男性' => 1,
            '女性' => 2,
            'その他' => 3,
        ];
        $contact['gender'] = $gender_map[$request->input('gender')]; // 性別を数値に変換
        Contact::create($contact); // データベースに保存
        return view('thanks');
    }

    public function test()
    {
        return view('test');
    }

}
