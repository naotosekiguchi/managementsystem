@extends('layouts.app')

@section('title', 'ユーザログイン画面')

@section('content')
    <div class="container">
        <h1>ユーザログイン画面</h1>
        <form action="{{ route('login.submit') }}" method="post">
            @csrf

            <div class="container_form">
                <input type="text" class="container_form-input" id="pass" name="pass" placeholder="パスワード">
                @if ($errors->has('pass'))
                    <p>{{ $errors->first('pass') }}</p>
                @endif
            </div>

            <div class="container_form">
                <input type="text" class="container_form-input" id="email" name="email" placeholder="アドレス">
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>

            <button type="submit" class="container_btn"><a href="{{route('regist')}}">新規登録</a></button>
            <button type="submit" class="container_btn">ログイン</button>
        </form>
    </div>
@endsection
