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
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|min:7|max:7|',
            'address' => 'required',
            'opinion' => 'required|max:20',
        ]);

        $inputs = $request->all();

        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function thanks(Request $request)
    {
        if ($request->get('back')) {
            return redirect('/contact')->withInput();
        }

        $contact = new Contact();
        $contact->fullname = $request->last_name.' '.first_name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->postcode = $request->postcode;
        $contact->address = $request->address;
        $contact->building_name = $request->building;
        $contact->opinion = $request->opinion;
        $contact->save();

        return view('contact.thanks');
    }

    public function search(Request $request)
    {
        // キーワードを取得
        $keyword = $request->input('name');
        //クエリ作成
        $query = Contact::query();
        //キーワードが入力されている場合
        if(!empty($keyword)){
            $query->where('fullname', 'like', '%'.$keyword.'%');
        }

        $gender = $request->input('gender');
        if(isset($gender)){
            $query->where('gender', $gender);
        }

        // 登録日
        // $register_date = $request->input('from, until');
        // if (!empty($request['from']) && !empty($request['until'])) {
        // ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
        //     $query->where('gender', $gender);

        // $date = Date::getDate($request['from'], $request['until']);

        // $date = $request->input('gender');
        // if (!empty($request['from']) && !empty($request['until'])) {
        //     ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
        //     $date = Date::getDate($request['from'], $request['until']);
        // } else {
        //     リクエストデータがなければそのままで表示
        //     $date = Date::get();
        // }



        $email = $request->input('email');
        if(!empty($email)){
            $query->where('email', 'like', '%'.$email.'%');
        }



        $posts = $query->get();



        return view('contact.search', ['posts' => $posts]);
    }
}
