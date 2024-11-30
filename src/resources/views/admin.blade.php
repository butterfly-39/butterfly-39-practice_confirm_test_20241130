@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<form class="header__button" action="/logout" method="post">
    @csrf
    logout
</form>
@endsection

@section('content')
<h2>Admin</h2>
    <div class="search-bar">
        <input type="text" placeholder="名前やメールアドレスを入力してください">
        <select>
            <option>性別</option>
            <option>男性</option>
            <option>女性</option>
        </select>
        <select>
            <option>お問い合わせの種類</option>
        </select>
        <select>
            <option>年/月/日</option>
        </select>
        <button class="search-btn">検索</button>
        <button class="reset-btn">リセット</button>
    </div>

    <button class="export-btn">エクスポート</button>

    <div class="pagination">
        <button>&lt;</button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
        <button>5</button>
        <button>&gt;</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contents as $content)
            <tr>
                <td>{{ $content->name }}</td>
                <td>{{ $content->gender }}</td>
                <td>{{ $content->email }}</td>
                <td>{{ $content->subject }}</td>
                <td><button class="detail-btn">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection