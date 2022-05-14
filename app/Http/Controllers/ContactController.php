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

    public function search(Request $request)
    {
        $messages = Contact::all();

        return view('contact.search', [
            'messages' => $messages
        ]);
    }

    public function result(Request $request)
    {
        // $keyword = $request;

        // dd($keyword);
        // $query = Contact::query();

        // if(!empty($keyword)) {
        //     $posts = $query->where('name', 'LIKE', "%{$keyword}%");
        // }
        // $posts = $query->get();
        // dd($post)

        // return view('contact.result', [
        //     'posts' => $posts,

        // ]);


        // キーワードを取得
        $keyword = $request->input('name');

        //クエリ作成
        $query = Contact::query();

        //キーワードが入力されている場合
        if(!empty($keyword)){
        $query->where('fullname', 'like', '%'.$keyword.'%');
            //   ->orWhere('body','like','%'.$keyword.'%');
        }
        $posts = $query->get();

        return view('contact.result', ['posts' => $posts]);

        // return view('contact.result')->with(compact("blogs","keyword"));





        // else {
        // return view('/serch')->with('message',$message);
        // }
    }

        // return view('contact.search', [
        //     'messages' => $messages,
        // ]);

        // $contacts = $query->where('name','like', '%' .$keyword_name. '%')->get();
        // return view('/contact/search')->with([
        //     'contacts' => $contacts,
        //     'guide' => $guide,
        // ]);
        // } else {
        // return view('contact.search', [
        //     'messages' => $messages,
        // ]);



    //     return view('contact.search', [
    //         'messages' => $messages,
    //     ]);
    // }


    // public function result(Request $request) {

    //     $keyword_name = $request->name;
    //     // $keyword_age = $request->age;
    //     // $keyword_sex = $request->sex;
    //     // $keyword_age_condition = $request->age_condition;

    //     if(!empty($keyword_name)) {
    //     $query = Contact::query();
    //     $contacts = $query->where('name','like', '%' .$keyword_name. '%')->get();
    //     $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
    //     return view('/serch')->with([
    //         'contacts' => $contacts,
    //         'message' => $message,
    //     ]);
    //     }

    //     elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 0){
    //         $message = "年齢の条件を選択してください";
    //         return view('/serch')->with([
    //             'message' => $message,
    //         ]);
    //     }
    //     elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
    //     $query = User::query();
    //     $users = $query->where('age','>=', $keyword_age)->get();
    //     $message = $keyword_age. "歳以上の検索が完了しました";
    //     return view('/serch')->with([
    //         'users' => $users,
    //         'message' => $message,
    //     ]);
    //     }
    //     elseif(empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
    //     $query = User::query();
    //     $users = $query->where('age','<=', $keyword_age)->get();
    //     $message = $keyword_age. "歳以下の検索が完了しました";
    //     return view('/serch')->with([
    //         'users' => $users,
    //         'message' => $message,
    //     ]);
    //     }
    //     elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 1){
    //     $query = User::query();
    //     $users = $query->where('name','like', '%' .$keyword_name. '%')->where('age','>=', $keyword_age)->get();
    //     $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以上の検索が完了しました";
    //     return view('/serch')->with([
    //         'users' => $users,
    //         'message' => $message,
    //     ]);
    //     }
    //     elseif(!empty($keyword_name) && !empty($keyword_age) && $keyword_age_condition == 2){
    //     $query = User::query();
    //     $users = $query->where('name','like', '%' .$keyword_name. '%')->where('age','<=', $keyword_age)->get();
    //     $message = "「".$keyword_name . "」を含む名前と". $keyword_age. "歳以下の検索が完了しました";
    //     return view('/serch')->with([
    //         'users' => $users,
    //         'message' => $message,
    //     ]);
    //     }
    //     elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 1){
    //     $query = User::query();
    //     $users = $query->where('sex','男')->get();
    //     $message = "男性の検索が完了しました";
    //             return view('/serch')->with([
    //             'users' => $users,
    //             'message' => $message,
    //             ]);
    //     }
    //     elseif(empty($keyword_name) && empty($keyword_age) && $keyword_sex == 2){
    //     $query = User::query();
    //     $users = $query->where('sex','女')->get();
    //     $message = "女性の検索が完了しました";
    //             return view('/serch')->with([
    //             'users' => $users,
    //             'message' => $message,
    //             ]);
    //     }
    //     else {
    //     $message = "検索結果はありません。";
    //     return view('/serch')->with('message',$message);
    //     }
    // }



}
