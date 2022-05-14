@extends('layouts.layout')

@section('content')
<p>{{ __('ご意見いただきありがとうございました。') }}</p>
<button onclick="location.href='/contact'" class="center">
    トップページへ
</button>
@endsection
