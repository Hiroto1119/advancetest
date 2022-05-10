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

    <label>性別</label>
    {{ $inputs['gender'] }}
    <input
        name="gender"
        value="{{ $inputs['gender'] }}"
        type="hidden">

    <label>メールアドレス</label>
    {{ $inputs['email'] }}
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden">

    <label>郵便番号</label>
    {{ $inputs['postcode'] }}
    <input
        name="postcode"
        value="{{ $inputs['postcode'] }}"
        type="hidden">

    <label>お問い合わせ内容</label>
    {!! nl2br(e($inputs['opinion'])) !!}
    <input
        name="opinion"
        value="{{ $inputs['opinion'] }}"
        type="hidden">

    <button type="submit" name="action" value="back">
        入力内容修正
    </button>
    <button type="submit" name="action" value="submit">
        送信する
    </button>
</form>
@endsection
