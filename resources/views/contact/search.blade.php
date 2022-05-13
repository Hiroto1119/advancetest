@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="text-center">管理システム</h1>

    {{-- <form action="{{ url('/serch')}}" method="post"> --}}
    <form class="form-horizontal" method="POST" action="{{ route('contact.result') }}">
        @csrf

        {{-- {{method_field('get')}} --}}

        <div class="form-group">
            <label>名前</label>
            <input type="text" class="form-control col-md-5" name="name">
        </div>

        <div class="form-group">
            <label>性別</label>
            <input type="radio" name="gender" value = "" checked="checked">全て
            <input type="radio" name="gender" value = "0">男性
            <input type="radio" name="gender" value = "1">女性
        </div>

        <div class="form-group">
            <label>登録日</label>
            <input type="text" class="form-control col-md-5" name="name">
        </div>

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="text" class="form-control col-md-5" name="name">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-dark mt-5">検索</button>
        </div>

        <div class="text-center">
            <a href="" class="">リセット</a>
        </div>
    </form>

    @if(session('flash_message'))
        <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
    @endif
    <div style="margin-top:50px;">
        <h1>ユーザー一覧</h1>
        <table class="table">
        <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>ご意見</th>
        </tr>
        @foreach($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->fullname}}</td>
            <td>{{$message->gender}}</td>
            <td>{{$message->email}}</td>
            <td>{{Str::limit($message->opinion, 25, '...')}}</td>
        </tr>
        @endforeach
        </table>
    </div>
</div>

{{-- <div style="margin-top:50px;">
<h1>検索結果</h1>
@if(isset($users))
<table class="table">
  <tr>
    <th>ユーザー名</th><th>年齢</th><th>性別</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td><td>{{$user->age}}</td><td>{{$user->sex}}</td>
    </tr>
  @endforeach
</table>
@endif
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div> --}}

@endsection
