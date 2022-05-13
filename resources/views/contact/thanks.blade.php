{{-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>サンクス</title>
</head>
<body>

</body>
</html> --}}

@extends('layouts.layout')

@section('content')
<p>{{ __('ご意見いただきありがとうございました。') }}</p>
<button onclick="location.href='/contact'" class="center">
    トップページへ
</button>
@endsection
