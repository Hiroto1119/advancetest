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
    <input type="radio" name="gender" value = "1" checked="checked">男性
    <input type="radio" name="gender" value = "2">女性
    @if ($errors->has('gender'))
        <p class="error-message">{{ $errors->first('gender') }}</p>
    @endif
    <br>

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
