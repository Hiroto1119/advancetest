<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|min:7|max:7|',
            'address' => 'required',
            'opinion' => 'required|max:20',
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

        if ($request->get('back')) {
            return redirect('/contact')->withInput();
        }

        // DBにデータを保存
        $contact = new Contact();
        $contact->fullname = $request->name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->postcode = $request->postcode;
        $contact->address = $request->address;
        $contact->building_name = $request->building;
        $contact->opinion = $request->opinion;
        $contact->save();

        return view('contact.thanks');
    }

    // public function thanks(Request $request)
    // {
    //     $post = new Contact();
    //     $post->all() = $request->all();
    //     $post->save();
    //     return redirect('/');
    //     return view('contact.thanks');
    //     return view('contact.thanks');
    // }
}
