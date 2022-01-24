<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use App\Models\Cqresult;

class TopController extends Controller
{
    /**
     * ログイン処理
     *
     */
    public function loginPost (Request $request) {
        $loginFlg = false;
        $user_info = [];
        //バリデーション
        $validatedData = $request->validate([
            'login_user_id' => ['required', 'max:100'],
            'password'      => ['required', 'max:400']
        ]);
        
        //ユーザー情報の取得
        $user = Login::getUserInfo($request->input('login_user_id'));

        if(!empty($user) && Hash::check($request->input('password'), $user->password)){
            $loginFlg = true;
            $user_info['id'] = $user->id;
            $user_info['login_user_id'] = $user->login_user_id;
            $user_info['password'] = $user->password;
            $user_info['name'] = $user->name;
        }else {
            $err = "ログインできませんでした、IDとパスワードをお確かめください。";
        }
        
        if($loginFlg){
            session(['user_info' => $user_info]);
            return redirect('/top');
        }else{
            $request->session()->put('err', $err);
            return redirect()->back();
        }
    }
         public function topView(Request $request){
        if(!session()->has('user_info')){
            return view('login');
        }
        $session = session("user_info");
        $cqresults = Cqresult::orderBy('created_at', 'desc')->paginate(10);

        return view('app')->with('session', $session)->with('cqresults',$cqresults);
    } 
}
