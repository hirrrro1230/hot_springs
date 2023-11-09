<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#SpringModelを使用できるように定義
use App\Spring;
use Auth;

class SpringsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //投稿画面を表示
    public function create()
    {
        return view('springs.create');
    }

    //投稿の登録
    public function store(Request $request)
    {
        // バリデーションの実装
        $this->validate($request, [
            'name' => 'required|max:30',
            'address' => 'required'
        ]);
        //フォームの入力値を取得
        $inputs = \Request::all();
        //認証情報からユーザーIDの取得
        $inputs['user_id'] = Auth::user()->id;
        //投稿の登録処理
        Spring::create($inputs);
        //ホーム画面へリダイレクト
        return redirect('home');
    }

    // 投稿の削除
    public function destroy($id) {
        $spring = Spring::find($id);

        //投稿が存在しない場合のエラーハンドリング
        if (!$spring) {
            return redirect()->back()->with('error', '投稿が見つかりません');
        }
        // 認証されたユーザーが投稿者であるか確認
        if ($spring->user_id == Auth::user()->id) {
            // 投稿を削除
            $spring->delete();
            return redirect()->back()->with('success', '投稿が削除されました');
        } else {
            return redirect()->back()->with('error', '権限がありません。');
        }
    }

    // 編集画面を表示
    public function edit($id)
    {
        $spring = Spring::find($id);

        // 投稿が存在しない場合のエラーハンドリング
        if (!$spring) {
            return redirect()->back()->with('error', '投稿が見つかりません');
        }

        // 認証されたユーザーが投稿者であるか確認
        if ($spring->user_id == Auth::user()->id) {
            return view('springs.edit', compact('spring'));
        } else {
            return redirect()->back()->with('error', '権限がありません。');
        }
    }

    // 投稿の更新
    public function update(Request $request, $id)
    {
        $spring = Spring::find($id);

        // 投稿が存在しない場合のエラーハンドリング
        if (!$spring) {
            return redirect()->back()->with('error', '投稿が見つかりません');
        }

        // 認証されたユーザーが投稿者であるか確認
        if ($spring->user_id == Auth::user()->id) {
            // バリデーションの実装
            $this->validate($request, [
                'name' => 'required|max:30',
                'address' => 'required'
            ]);

            // フォームの入力値を更新
            $spring->update($request->all());
            //ホーム画面へリダイレクト
            return redirect('home')->with('success', '投稿が更新されました');
        } else {
            return redirect()->back()->with('error', '権限がありません。');
        }
    }
}
