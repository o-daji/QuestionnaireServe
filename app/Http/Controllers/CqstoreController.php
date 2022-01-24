<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;


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
        $answer1 =$request->answerGrp1;



         Cqresult::create([
            'construction_no' =>$request->input('construction_no'),
            'customer_name' =>$request->input('customer_name'),
            'operating_schedule_sales' =>$request->input('o_s_sales'),
            'operating_schedule_design' =>$request->input('o_s_design'),
            'operating_schedule_Construction' =>$request->input('o_s_construction'),
            'operating_date_st' =>$request->input('operating_date_st'),
            'operating_date_ed' =>$request->input('operating_date_ed'),
            'adv_permission' =>$request->advpermGrp1,
            'answer1' =>$request->answerGrp1,
            'answer2' =>$request->answerGrp2,
            'answer3' =>$request->answerGrp3,
            'answer4' =>$request->answerGrp4,
            'answer5' =>$request->answerGrp5,
            'answer6' =>$request->answerGrp6,
            'answer7' =>$request->answerGrp7,
            'answer_freetext' => $request->input('answer_freetext')
        ]); 


        return redirect('/top')->with('statusmessage', "アンケートを新規登録しました");
    }
}
