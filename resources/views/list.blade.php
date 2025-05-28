@extends('layouts.app')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('/css/list.css')}}">
@endsection


@section('title', '商品情報一覧画面')

@section('content')
<script src="{{ asset('js/list.js') }}"></script>
<h1>商品一覧画面</h1>

    <form action="{{ route('product.serch') }}" method="post">
        @csrf
        <input type="text" class="container_form-input" id="keyword" name="keyword" placeholder="検索キーワード">
        
        <select name="maker" id="maker">
            @foreach ($companies as $company) 
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
        <button type="submit" name="search" class="btn btn-default">検索</button>
    </form>

    <div class="products">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th><button type="submit"><a href="{{route('show.Regist')}}">新規登録</a></button>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product) 
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset($product->img_path) }}" alt="画像"></td>
                    <td id="product_name">{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company_name }}</td>
                    <td>
                        <button type="submit"><a href="{{route('detail', ['id'=>$product->id] )}}">詳細</a></button>
                        <button type="submit"><a href="{{route('delete.product', ['id'=>$product->id]) }}" 
                            onclick="deleteAlert(event)">削除</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
