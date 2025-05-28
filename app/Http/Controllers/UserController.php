<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //ログイン画面表示
    public function showLogin() {
        return view('login');
    }

    //ログイン処理
    public function loginSubmit(LoginRequest $request) {
        //インスタンス生成
        $model = new Product();
        $products = $model->getList();
        $companies = $model->getCompany();
        return view('list',['products' => $products],['companies' => $companies]);
    }
    

    //新規登録画面表示
    public function showRegistForm() {
        return view('regist');
    }

    //新規登録機能
    public function registSubmit(UserRequest $request) {

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $model = new User();
            $model->registUser($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        // 処理が完了したらログイン画面に推移
        return view('login');
    }
}
