<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# SpringModelを使用できるように定義
use App\Spring;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #Springの一覧を取得
        // $springs = Spring::all();
        $springs = Spring::orderBy('id', 'desc')->get();

        #ホーム画面でspringsの変数を使えるように渡す
        return view('home', compact('springs'));
    }
}
