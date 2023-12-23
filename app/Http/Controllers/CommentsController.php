<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // コメントの登録
    public function store()
    {
        // フォームの入力値を取得
        $inputs = \Request::all();

        //認証情報からユーザーIDの取得
        $inputs['user_id'] = Auth::user()->id;

        //コメントの登録処理
        Comment::create($inputs);

        //ホーム画面へリダイレクト
        return redirect('home');
    }

    // コメントの削除
    public function destroy($id) {
        $comment = Comment::find($id);

        if ($comment->user_id == Auth::user()->id) {
            // コメントを削除
            $comment->delete();
            return redirect()->back()->with('success', 'コメントを削除しました');
        } else {
            return redirect()->back()->with('error', '権限がありません');
        }
    }

    // コメント編集画面を表示
    public function edit($id) {
        $comment = Comment::find($id);

        // 投稿が存在しない場合のエラーハンドリング
        if (!$comment) {
            return redirect()->back()->with('error', '投稿が見つかりません');
        }

        // 認証されたユーザーが投稿者であるか確認
        if ($comment->user_id == Auth::user()->id) {
            return view('comments.edit', compact('comment'));
        } else {
            return redirect()->back()->with('error', '権限がありません。');
        }
    }
}
