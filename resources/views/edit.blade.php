@extends('layouts.app')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('/css/editproduct.css')}}">
@endsection

@section('title', '商品情報編集画面')

@section('content')
<h1>商品情報編集画面</h1>
    <form action="{{ route('edit.submit', ['id'=>$product->id]) }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="container_form">
            <label for="id">ID</label>
            {{ $product->id }}
        </div>

        <div class="container_form">
            <label for="productname">商品名<span>*</span></label>
            <input type="text" class="container_form-input" id="productname" 
                name="productname" value="{{ $product->product_name }}">
            @if ($errors->has('productname'))
                <p>{{ $errors->first('productname') }}</p>
            @endif
        </div>

        <div class="container_form">
            <label for="maker">メーカー名<span>*</span></label>
            <select name="maker" id="maker">
                @foreach ($companies as $company)
                    @if ( $company->company_name == $product->company_name )
                        <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option>
                    @else
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('maker'))
                <p>{{ $errors->first('maker') }}</p>
            @endif
        </div>

        <div class="container_form">
            <label for="price">価格<span>*</span></label>
            <input type="text" class="container_form-input" id="price" name="price" value="{{ $product->price }}">
            @if ($errors->has('price'))
                <p>{{ $errors->first('price') }}</p>
            @endif
        </div>

        <div class="container_form">
            <label for="stock">在庫数<span>*</span></label>
            <input type="text" class="container_form-input" id="stock" name="stock" value="{{ $product->stock }}">
            @if ($errors->has('stock'))
                <p>{{ $errors->first('stock') }}</p>
            @endif
        </div>

        <div class="container_form">
            <label for="comment">コメント</label>
            <textarea class="container_form-input" id="comment" name="comment">{{ $product->comment }}</textarea>
        </div>

        <div class="container_form">
            <label for="image">商品画像</label>
            <input type="file" name="image" accept=".png, .jpg, .jpeg">
        </div>

        <button type="submit" name="renew">更新</button>
        <button type="submit" name="back">戻る</button>
    </form>

@endsection
