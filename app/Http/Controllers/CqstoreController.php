<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;
use Illuminate\Support\Facades\Validator;
use App\Controllers\ValidateCommonController;


class CqstoreController extends Controller
{
    //登録画面を返す。
    public function store()
    {
        return view('store');
    }
    //新規アンケートを登録する。
    public function cqDataStore(Request $request)
    {

/*         $validator = Validator::make($request->all(), [
            'construction_no' => 'required',
            'customer_name' => 'required',
            'operating_date_st' => 'required',
            'operating_date_ed' => 'required',
            'construction_no' => 'required',
        ]); */




        //入力項目のチェック
        //ルールの取得
        $customValidate = app()->make('App\Http\Controllers\ValidateCommonController');
        $rule = $customValidate->customrule();
        $message = $customValidate->custommsg();

        $validator = Validator::make($request->all(), $rule, $message); 
        if ($validator->fails()) {
                        return redirect()->route('store')->withErrors($validator);
        }

        //データの登録。
        Cqresult::create([
            'construction_no' => $request->input('construction_no'),
            'customer_name' => $request->input('customer_name'),
            'operating_schedule_sales' => $request->input('o_s_sales'),
            'operating_schedule_design' => $request->input('o_s_design'),
            'operating_schedule_Construction' => $request->input('o_s_construction'),
            'operating_date_st' => $request->input('operating_date_st'),
            'operating_date_ed' => $request->input('operating_date_ed'),
            'adv_permission' => $request->advpermGrp1,
            'answer1' => $request->answerGrp1,
            'answer2' => $request->answerGrp2,
            'answer3' => $request->answerGrp3,
            'answer4' => $request->answerGrp4,
            'answer5' => $request->answerGrp5,
            'answer6' => $request->answerGrp6,
            'answer7' => $request->answerGrp7,
            'answer_freetext' => $request->input('answer_freetext')
        ]);
        return redirect('/top')->with('statusmessage', "アンケートを新規登録しました");
    }


    public function storeDataValidates(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'construction_no' => 'required',
            'customer_name' => 'required',
            'operating_date_st' => 'required',
            'operating_date_ed' => 'required',
            'construction_no' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('store')->withErrors($validator);
        }
    }
}
