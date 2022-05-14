@extends('layouts.layout')

@section('content')
<form method="POST" action="{{ route('contact.thanks') }}">
    @csrf
    <label>名前</label>
    {{ $inputs['name'] }}
    <input
        name="name"
        value="{{ $inputs['name'] }}"
        type="hidden">
    <br>

    <label>性別</label>
    {{ $inputs['gender'] }}
    <input
        name="gender"
        value="{{ $inputs['gender'] }}"
        type="hidden">
    <br>

    <label>メールアドレス</label>
    {{ $inputs['email'] }}
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden">
    <br>

    <label>郵便番号</label>
    {{ $inputs['postcode'] }}
    <input
        name="postcode"
        value="{{ $inputs['postcode'] }}"
        type="hidden">
    <br>

    <label>住所</label>
    {{ $inputs['address'] }}
    <input
        name="address"
        value="{{ $inputs['address'] }}"
        type="hidden">
    <br>

    <label>建物</label>
    {{ $inputs['building'] }}
    <input
        name="building"
        value="{{ $inputs['building'] }}"
        type="hidden">
    <br>

    <label>お問い合わせ内容</label>
    {!! nl2br(e($inputs['opinion'])) !!}
    <input
        name="opinion"
        value="{{ $inputs['opinion'] }}"
        type="hidden">
    <br>

    <button name="action" type="submit" value="true">登録</button>
    <br>
    <button name="back" type="submit" value="true">戻る</button>
</form>
@endsection
