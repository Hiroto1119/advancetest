<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function index()
    // {
    //     return view('index');
    // }

    public function index()
    {
        return view('contact.index');
    }

    // public function confirm(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|min:3|max:20'
    //     ], [
    //         'new_content.required' => '必須項目です！',
    //         'new_content.min' => ':min 文字以上入力してください。',
    //         'new_content.max' => ':max 文字以下で入力しください。'
    //     ]);

    //     $post = new Content();
    //     $post = $request;
    //     $post->save();
    //     return redirect('/');
    // }

    public function confirm(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required',
            'address' => 'required',
            'building' => 'required',
            'opinion' => 'required',
        ]);

        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function thanks(Request $request)
    {
        $post = new Contact();
        $post->all() = $request->all();
        $post->save();
        return redirect('/');
        return view('contact.thanks');
    }
}
