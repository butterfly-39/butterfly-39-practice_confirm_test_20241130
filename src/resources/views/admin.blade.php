@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<form class="header__button" action="/login" method="post">
    @csrf
    logout
</form>
@endsection

@section('content')
<h2>Admin</h2>
    <div class="search-bar">
        <form action="/admin" method="get">
            <input type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{ request('search') }}">
            <select name="gender">
                <option value="" selected>性別</option>
                <option value="0" {{ request('gender') == '0' ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category">
                <option>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
            <input type="date" name="date" class="date-picker" value="{{ request('date') }}">
            <button type="submit" class="search-btn">検索</button>
            <button type="reset" class="reset-btn">リセット</button>
        </form>
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
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if($contact->gender == 1)
                        男性
                    @elseif($contact->gender == 2)
                        女性
                    @elseif($contact->gender == 3)
                        その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td><button class="detail-btn">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection