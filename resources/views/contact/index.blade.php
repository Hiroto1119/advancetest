@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="navbar">
        <h1 class="text-center mt-5 mb-5">お問い合わせ</h1>
    </div>

    <form class="form-horizontal" method="POST" action="{{ route('contact.confirm') }}">
        @csrf

        <div class="form-group row">
            <label class="col-sm-2 control-label">お名前 <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <input class="form-control" name="name" value="{{ old('name') }}" type="text">
            </div>
        </div>
        @if ($errors->has('name'))
            <p class="error-message">{{ $errors->first('name') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">性別 <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <input type="radio" name="gender" value = "0" checked="checked">男性
                <input type="radio" name="gender" value = "1">女性
            </div>
        </div>
        @if ($errors->has('gender'))
            <p class="error-message">{{ $errors->first('gender') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">メールアドレス <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <input class="form-control" name="email" value="{{ old('email') }}" type="text">
            </div>
        </div>
        @if ($errors->has('email'))
            <p class="error-message">{{ $errors->first('email') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">郵便番号 <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <input class="form-control"  name="postcode" value="{{ old('postcode') }}" type="text">
            </div>
        </div>
        @if ($errors->has('postcode'))
            <p class="error-message">{{ $errors->first('postcode') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">住所 <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <input class="form-control"  name="address" value="{{ old('address') }}" type="text">
            </div>
        </div>
        @if ($errors->has('address'))
            <p class="error-message">{{ $errors->first('address') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">建物</label>
            <div class="col-sm-10">
                <input class="form-control"  name="building" value="{{ old('building') }}" type="text">
            </div>
        </div>
        @if ($errors->has('building'))
            <p class="error-message">{{ $errors->first('building') }}</p>
        @endif

        <div class="form-group row">
            <label class="col-sm-2 control-label">お問い合わせ内容 <span class="label label-danger">必須</span></label>
            <div class="col-sm-10">
                <textarea class="form-control"  name="opinion">{{ old('opinion') }}</textarea>
            </div>
        </div>
        @if ($errors->has('opinion'))
            <p class="error-message">{{ $errors->first('opinion') }}</p>
        @endif

        <div class="text-center">
            <button type="submit" class="btn btn-dark">入力内容確認</button>
        </div>

    </form>
</div>
@endsection
