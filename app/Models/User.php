<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public function registUser($data) {
        // 登録処理
        DB::table('users')->insert([
            'user_name' => $data->name,
            'email' => $data->email,
            'password' => $data->pass,
        ]);
    }
}
