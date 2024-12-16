@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" value="{{ old('last_name')}}" placeholder="例: 山田" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" value="{{ old('first_name')}}"placeholder="例: 太郎" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label class="contact-form__gender-label">
                        <input class="contact-form__gender-input" name="gender" type="radio" value="男性" {{ old('gender','男性') == '男性' ? 'checked' : '' }} />
                        <span class="contact-form__gender-text">男性</span>
                    </label>
                </div>
                <div class="form__input--radio">
                    <label class="contact-form__gender-label">
                        <input class="contact-form__gender-input" type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}>
                        <span class="contact-form__gender-text">女性</span>
                    </label>
                </div>
                <div class="form__input--radio">
                    <label class="contact-form__gender-label" for="other">
                        <input class="contact-form__gender-input" type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }}>
                        <span class="contact-form__gender-text">その他</span>
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- メールアドレス -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email')}}" placeholder="例: test@example.com">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 電話番号 -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="080"> -
                    <input type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234"> -
                    <input type="tel" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
                </div>
                <div class="form__error">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 住所 -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" value="{{ old('address')}}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 建物名 -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" value="{{ old('building')}}" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>
        </div>
        <!-- お問い合わせの種類 -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select class="contact-form__select" name="category_id" id="category" >
                        <option disabled selected>選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail')}}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection