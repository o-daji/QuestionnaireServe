<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;

class CqresultSearchController extends Controller
{
    public function selectCqresultCondition(Request $request){
        if(!session()->has('user_info')){
            return view('login');
        }
        $session = session("user_info");
        //全部チェックoffの場合は全件検索（どの工程も存在しないのは業務上ありえない。）
        if($request->input('o_s_sales')==0
         and $request->input('o_s_design')==0
          and $request->input('o_s_construction')==0){
            $cqresults = Cqresult::orderBy('created_at', 'desc')->paginate(10);
         }
         else{
        $cqresults = Cqresult::where('operating_schedule_sales',$request->input('o_s_sales'))
        ->where('operating_schedule_design',$request->input('o_s_design'))
        ->where('operating_schedule_Construction',$request->input('o_s_construction'))->paginate(10);
    }

        return view('app')->with('session', $session)->with('cqresults',$cqresults);
    } 
}