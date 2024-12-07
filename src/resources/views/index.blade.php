@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h2>Contact</h2>
<div class="contact-form__content">
    <form action="/confirm" method="post">
        @csrf
        <div class="form-group">
            <label for="name">お名前 <span class="required">*</span></label>
            <div class="input-group">
                <input type="text" name="last_name" value="{{ old('last_name')}}" placeholder="例: 山田">
            </div>
            <div class="form__error">
                @error('last_name')
                {{ $message }}
                @enderror
            </div>
            <div class="input-group">
                <input type="text" name="first_name" value="{{ old('first_name')}}"placeholder="例: 太郎">
            </div>
            <div class="form__error">
                @error('first_name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="gender">性別 <span class="required">*</span></label>
            <div class="input-radio">
                <label><input type="radio" name="gender" value="男性" checked> 男性</label>
                <label><input type="radio" name="gender" value="女性"> 女性</label>
                <label><input type="radio" name="gender" value="その他"> その他</label>
            </div>
            <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス <span class="required">*</span></label>
            <div class="input-group">
                <input type="email" name="email" value="{{ old('email')}}" placeholder="例: test@example.com">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="tel">電話番号 <span class="required">*</span></label>
            <div class="input-tel">
                <input type="tel" name="tel1" placeholder="080"> -
                <input type="tel" name="tel2" placeholder="1234"> -
                <input type="tel" name="tel3" placeholder="5678">
            </div>
            <div class="form__error">
                @error('tel')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="address">住所 <span class="required">*</span></label>
            <div class="input-group">
                <input type="text" name="address" value="{{ old('address')}}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <div class="input-group">
                <input type="text" name="building" value="{{ old('building')}}" placeholder="例: 千駄ヶ谷マンション101">
            </div>
        </div>
        <div class="form-group">
            <label for="category">お問い合わせの種類 <span class="required">*</span></label>
                <select id="category" name="inquiry_type">
                    <option value="">選択してください</option>
                    <option value="商品のお届けについて">商品のお届けについて</option>
                    <option value="商品の交換について">商品の交換について</option>
                    <option value="商品トラブル">商品トラブル</option>
                    <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                    <option value="その他">その他</option>
                </select>
            <div class="form__error">
                @error('inquiry_type')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="content">お問い合わせ内容 <span class="required">*</span></label>
            <div class="input-group">
                <textarea name="inquiry_content" placeholder="お問い合わせ内容をご記載ください">{{ old('inquiry_content')}}</textarea>
            </div>
            <div class="form__error">
                @error('inquiry_content')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">確認画面</button>
        </div>
    </form>
</div>
@endsection