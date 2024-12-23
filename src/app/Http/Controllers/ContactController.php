<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('index', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request) //確認画面に遷移
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tel'] = $tel; // 結合した電話番号を追加
        $category = Category::find($request->category_id); // idを使用して対象のデータを取得
        return view('confirm', compact('contact','category'));
    }

    public function handleForm(Request $request) //データベースに値を追加・保存
    {
        // 修正ボタンが押された場合
        if ($request->has('back')) {
            // 入力画面にリダイレクトし、入力内容を引き継ぐ
            return redirect("/")->withInput();
        }

            // 必要なデータを取得
            $contact = $request->only(['last_name', 'first_name','gender', 'email', 'address', 'building', 'category_id', 'detail','tel']);
            // 性別を数値に変換
            $gender_map = [
                '男性' => 1,
                '女性' => 2,
                'その他' => 3,
            ];
            $contact['gender'] = $gender_map[$request->input('gender')];
            // データベースに保存
            Contact::create($contact);
            // サンクスページへリダイレクト
            return view('thanks');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        // 名前やメールアドレスでの絞り込み
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('gender')) {
            if ($request->gender == '0') {
                // gender が '0'（全て）の場合は絞り込みを行わない
                $query->whereIn('gender', [1, 2, 3]);
            } else {
                // 特定の性別で絞り込み
                $query->where('gender', $request->gender);
            }
        }

        // カテゴリでの絞り込み
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 日付での絞り込み
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function admin()
    {
        $contacts = Contact::with('category')->orderBy('created_at', 'desc')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

}
