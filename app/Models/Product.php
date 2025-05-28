<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function getList() {
        //テーブルを連携させて取得
        $products = DB::table('products')
            //->join('sales','products.id','=','sales.product_id')//たぶんいらない
            ->join('companies','products.company_id','=','companies.id')
            ->select('products.*','companies.company_name')
            ->get();            

        return $products;
    }

    //会社情報取得
    public function getCompany() {
        $companies = DB::table('companies')->get();
        return $companies;
    }

    public function deleteList($id) {
        //商品情報削除
        DB::table('products')->where('id', $id)->delete();
        //DB::table('sales')->where('id', $id)->delete();
    }

    public function registProduct($data, $img_path) {
        //商品情報登録
        DB::table('products')->insert([
            'company_id' => $data->maker,
            'product_name' => $data->productname,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function getDetail($id) {
        //商品詳細表示
        $product = DB::table('products')
            ->where('products.id', $id)
            ->join('companies','products.company_id','=','companies.id')
            ->select('products.*','companies.company_name')
            ->first();            
        return $product;
    }

    public function renewProduct($id, $data, $img_path) {
        //商品情報編集
        DB::table('products')->where('id', $id)->update([
            'company_id' => $data->maker,
            'product_name' => $data->productname,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path,
        ]);

    }

    public function searchProduct($data) {
        //商品情報検索機能
        $product = DB::table('products')
            ->where('product_name', 'like', '%'. $data->keyword. '%')
            ->where('company_id', 'like', $data->maker)
            ->join('companies','products.company_id','=','companies.id')
            ->select('products.*','companies.company_name')
            ->get();            
        return $product;
    }
}
