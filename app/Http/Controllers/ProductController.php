<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function showList() {
        //インスタンス生成
        $model = new Product();
        $products = $model->getList();
        $companies = $model->getCompany();
        return view('list',['products' => $products],['companies' => $companies]);
    }



    public function deleteProduct($id) {
        //商品情報削除
        $model = new Product();
        $model->deleteList($id);

        //リダイレクト
        return redirect(route('list'));
    }

    public function showRegist() {
        //商品登録画面表示用
        $model = new Product();
        $companies = $model->getCompany();
        return view('product_regist',['companies' => $companies]);
    }

    public function productRegist(ProductRequest $request) {
        //商品登録機能
        if ($request->has('regist')){
            if ($request->file('image') != null) {//もし画像が選択されてたら
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $file_name);
                $image_path = 'storage/images/' . $file_name;
            }else{
                $image_path = null;
            }


            DB::beginTransaction();
            try {
                $model = new Product();
                $model->registProduct($request, $image_path);
                DB::commit();
                
            } catch (\Exception $e) {
                DB::rollback();
                return back();
            }

            //商品一覧に戻る
            $products = $model->getList();
            $companies = $model->getCompany();
            return view('list',['products' => $products],['companies' => $companies]);


        }elseif($request->has('back')){
            $model = new Product();
            $products = $model->getList();
            $companies = $model->getCompany();
            return view('list',['products' => $products],['companies' => $companies]);
        }
    }

    public function showDetail($id) {
        //商品詳細画面表示
        $model = new Product();
        $product = $model->getDetail($id);
        return view('detail',['product' => $product]);
    }

    public function showEdit($id) {
        //商品情報編集画面表示
        $model = new Product();
        $product = $model->getDetail($id);
        $companies = $model->getCompany();
        return view('edit',['product' => $product],['companies' => $companies]);
    }

    public function submitEdit(ProductRequest $request ,$id) {
        //商品情報編集機能
        if ($request->has('renew')) {
            if ($request->file('image') != null){//もし画像が選択されてたら
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $file_name);
                $image_path = 'storage/images/' . $file_name;
            }else{
                $image_path = null;
            }

            DB::beginTransaction();
            try {
                $model = new Product();
                $model->renewProduct($id, $request, $image_path);
                DB::commit();

            } catch (\Exception $e) {
                DB::rollback();
                return back();
            }

            //編集画面にリダイレクト
            $companies = $model->getCompany();
            return redirect(route('edit',['id' => $id],['companies' => $companies]));

        }elseif($request->has('back')){
            $model = new Product();
            $product = $model->getDetail($id);
            return view('detail',['product' => $product]);
        }
    }

    public function serchProduct(ProductRequest $request) {
        //商品検索機能
        $model = new Product();
        $products = $model->searchProduct($request);
        $companies = $model->getCompany();
        return view('list',['products' => $products],['companies' => $companies]);
    }
}
