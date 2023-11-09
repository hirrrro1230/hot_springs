<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// UserModelを使用できるように定義
use App\User;

class UsersController extends Controller
{
    // ユーザーの登録画面を表示
    public function create()
    {
        return view('users.create');
    }

    // ユーザー情報の登録
    public function store()
    {
        //フォームの入力値を取得
        $inputs = \Request::all();

        //パスワードのハッシュ化
        $inputs['password'] = Hash::make($inputs['password']);

        //ユーザーの登録処理
        User::create($inputs);

        //ログイン画面へリダイレクト
        return redirect('login');
    }
}
