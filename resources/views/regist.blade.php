@extends('layouts.app')

@section('title', 'ユーザ新規登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>ユーザ新規登録画面</h1>
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <div class="container_form">
                    <input type="text" class="container_form-input" id="title" name="name" placeholder="ユーザ名">
                    @if ($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <input type="text" class="container_form-input" id="url" name="email" placeholder="メールアドレス">
                    @if ($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <input type="password" class="container_form-input" id="url" name="pass" placeholder="パスワード">
                    @if ($errors->has('pass'))
                        <p>{{ $errors->first('pass') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <input type="password" class="container_form-input" id="url" 
                        name="pass_confirmation" placeholder="パスワード(確認用)">
                    @if ($errors->has('pass_confirmation'))
                        <p>{{ $errors->first('pass_confirmation') }}</p>
                    @endif
                </div>


                <button type="submit" class="btn btn-default">登録</button>
                <button type="submit" class="btn btn-default"><a href="{{route('login')}}">戻る</a></button>
            </form>
        </div>
    </div>
@endsection
