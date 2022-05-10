{{-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>お問い合わせ</title>
</head>
<body>
    <div class="container">
        <h1>お問い合わせ</h1>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
        <form action="create" method="post" class="createForm">
            @csrf
            <div>
                お名前
                <input type="text" id="name" name="name" class="name" value = "{{ old('name') }}">
            </div><br>
            <div>
                性別
                <input type="radio" id="gender" name="gender" class="gender" value = 0>男性
                <input type="radio" id="gender" name="gender" class="gender" value = 1>女性
            </div><br>
            <div>
                メールアドレス
                <input type="text" id="mail" name="mail" class="mail" value = "{{ old('mail') }}">
            </div><br>
            <div>
                郵便番号
                <input type="text" id="postcode" name="postcode" class="postcode" value = "{{ old('postcode') }}">
            </div><br>
            <div>
                住所
                <input type="text" id="address" name="address" class="address" value = "{{ old('address') }}">
            </div><br>
            <div>
                建物
                <input type="text" id="building" name="building" class="building" value = "{{ old('building') }}">
            </div><br>
            <div>
                ご意見
                <textarea id="opinion" name="opinion" class="opinion" value = "{{ old('opinion') }}"></textarea>
            </div><br>
            <input type="submit" value="確認" class="confirmButton">
        </form>
    </div>
</body>
</html> --}}


@extends('layouts.layout')

@section('content')
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <label>お名前</label>
    <input
        name="name"
        value="{{ old('name') }}"
        type="text">
    @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif
    <br>

    <label>性別</label>
    <input type="radio" name="gender" value = 0>男性
    <input type="radio" name="gender" value = 1>女性
    <br>

    {{-- <label>ラジオボタン<span class="required">※必須</span></label>
    <div class="radio">
        <label class="radio-inline">
            <input type="radio" name="gender" value="0">男性
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="1">女性
        </label>
    </div> --}}


    <label>メールアドレス</label>
    <input
        name="email"
        value="{{ old('email') }}"
        type="text">
    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
    <br>

    <label>郵便番号</label>
    <input
        name="postcode"
        value="{{ old('postcode') }}"
        type="text">
    @if ($errors->has('postcode'))
        <p class="error-message">{{ $errors->first('postcode') }}</p>
    @endif
    <br>

    <label>住所</label>
    <input
        name="address"
        value="{{ old('address') }}"
        type="text">
    @if ($errors->has('address'))
        <p class="error-message">{{ $errors->first('address') }}</p>
    @endif
    <br>

    <label>建物</label>
    <input
        name="building"
        value="{{ old('building') }}"
        type="text">
    @if ($errors->has('building'))
        <p class="error-message">{{ $errors->first('building') }}</p>
    @endif
    <br>

    <label>お問い合わせ内容</label>
    <textarea name="opinion">{{ old('opinion') }}</textarea>
    @if ($errors->has('opinion'))
        <p class="error-message">{{ $errors->first('opinion') }}</p>
    @endif
    <br>

    <button type="submit">
        入力内容確認
    </button>
</form>
@endsection
