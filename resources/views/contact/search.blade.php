@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="text-center">管理システム</h1>

    <form class="form-horizontal" method="GET" action="{{ route('contact.search') }}">
        @csrf
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
            {{-- <label>登録日</label>
            <input type="text" class="form-control col-md-5" name="register_date"> --}}
            <label>登録日</label>
            <br>
            <input type="date" name="from" placeholder="from_date">
                <span class="mx-3 text-grey">~</span>
            <input type="date" name="until" placeholder="until_date">
        </div>

        
        <div class="form-group">
            <label>メールアドレス</label>
            <input type="text" class="form-control col-md-5" name="email">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-dark mt-5">検索</button>
        </div>

        <div class="text-center">
            <a href="" class="">リセット</a>
        </div>
    </form>

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
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->fullname}}</td>
            <td>{{$post->gender}}</td>
            <td>{{$post->email}}</td>
            <td>{{Str::limit($post->opinion, 25, '...')}}</td>
        </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection
