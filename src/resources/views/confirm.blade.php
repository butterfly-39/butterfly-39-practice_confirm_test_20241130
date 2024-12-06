@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h2>Confirm</h2>
<div class="confirm-form__content">
    <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
        <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    <span><input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly /></span>
                    <span><input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly /></span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                    <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                    <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                    <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                    <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">
                    <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__text">
                    <input type="text" name="inquiry_type" value="{{ $contact['inquiry_type'] }}" readonly />
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                    <input type="text" name="inquiry_content" value="{{ $contact['inquiry_content'] }}" readonly />
                </td>
            </tr>
        </table>
    </div>
    <div class="button-group">
        <button class="submit-button">送信</button>
        <button class="edit-button">修正</button>
    </div>
    </form>
</div>
@endsection