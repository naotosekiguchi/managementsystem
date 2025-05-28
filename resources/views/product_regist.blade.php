@extends('layouts.app')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('/css/productregist.css')}}">
@endsection


@section('title', '商品新規登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <h1>商品新規登録画面</h1>
            <form action="{{ route('product.regist') }}" method="post" enctype='multipart/form-data'>
                @csrf

                <div class="container_form">
                    <label for="productname">商品名<span>*</span></label>
                    <input type="text" class="container_form-input" id="productname" name="productname">
                    @if ($errors->has('productname'))
                        <p>{{ $errors->first('productname') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <label for="maker">メーカー名<span>*</span></label>
                    <select name="maker" id="maker">
                        @foreach ($companies as $company) 
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('maker'))
                        <p>{{ $errors->first('maker') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <label for="price">価格<span>*</span></label>
                    <input type="text" class="container_form-input" id="price" name="price">
                    @if ($errors->has('price'))
                        <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <label for="stock">在庫数<span>*</span></label>
                    <input type="text" class="container_form-input" id="stock" name="stock">
                    @if ($errors->has('stock'))
                        <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="container_form">
                    <label for="comment">コメント</label>
                    <textarea class="container_form-input" id="comment" name="comment"></textarea>
                </div>

                <div class="container_form">
                    <label for="image">商品画像</label>
                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                </div>

                <button type="submit" name="regist" class="btn btn-default">新規登録</button>
                <button type="submit" name="back" class="btn btn-default">戻る</button>
            </form>
        </div>
    </div>
@endsection
