@extends('layouts.app')

@section('title', '商品情報詳細画面')

@section('content')
<h1>商品情報詳細画面</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td><img src="{{ asset($product->img_path) }}"></td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th>メーカー</th>
            <td>{{ $product->company_name }}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>在庫数</th>
            <td>{{ $product->stock }}</td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>{{ $product->comment }}</td>
        </tr>
    </table>

    <button type="submit"><a href="{{route('edit', ['id'=>$product->id] )}}">編集</a></button>
    <button type="submit"><a href="{{route('list')}}">戻る</a></button>

@endsection
