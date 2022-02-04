<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;

use function PHPUnit\Framework\isNull;

class CqresultSearchController extends Controller
{
    public function selectCqresultCondition(Request $request)
    {
        if (!session()->has('user_info')) {
            return view('login');
        }
        $session = session("user_info");

        //検索条件の入力値をセット
        $search1 = $request->input('construction_no');
        $search2 = $request->input('customer_name');
        $search3 = $request->input('operating_date_st');
        $search4 = $request->input('operating_date_ed');
        $search5 = $request->input('o_s_sales');
        $search6 = $request->input('o_s_design');
        $search7 = $request->input('o_s_construction');
        $search8 = $request->input('adv_perm_yes');
        $search9 = $request->input('adv_perm_no');

        //クエリを作成
        $query = Cqresult::query();

        //工事番号の検索条件追加
        if (!is_null($search1)) {
            $query->where('construction_no', 'like', '%' . $search1 . '%');
        }

        //顧客名の検索条件追加
        if (!is_null($search2)) {
            $query->where('customer_name', 'like', '%' . $search2 . '%');
        }

        //竣工開始・終了の検索条件追加
        if (!is_null($search3) && is_null($search4)) {
            $query->where('operating_date_st', '>=', $search3);
        } else if (is_null($search3) && !is_null($search4)) {
            $query->where('operating_date_ed', '<=', $search4);
        } else if (!is_null($search3) && !is_null($search4)) {
            $query->where('operating_date_st', '>=', $search3)
                ->where('operating_date_ed', '<=', $search4);
        }

        //実施工程(営業・設計・施工)の検索条件追加
        //営業、設計、施工の全てを実施
        if (!is_null($search5) && !is_null($search6) && !is_null($search7)) {
            $query->where('operating_schedule_sales','=', $search5)
            ->where('operating_schedule_design','=', $search6)
            ->where('operating_schedule_Construction','=', $search7);
        }
        //営業、設計を実施 
        else if (!is_null($search5) && !is_null($search6) && is_null($search7)) {
            $query->where('operating_schedule_sales','=', $search5)
            ->where('operating_schedule_design','=', $search6);
        }
        //営業、施工を実施
        else if (!is_null($search5) && is_null($search6) && !is_null($search7)) {
            $query->where('operating_schedule_sales','=', $search5)
            ->where('operating_schedule_Construction','=', $search7);
        }
        //設計、施工を実施
        else if (is_null($search5) && !is_null($search6) && !is_null($search7)) {
            $query->where('operating_schedule_design','=', $search6)
            ->where('operating_schedule_Construction','=', $search7);
        }
        //営業のみ実施
        else if (!is_null($search5) && is_null($search6) && is_null($search7)) {
            $query->where('operating_schedule_sales','=', $search5);
        }
        //設計のみ実施
        else if (is_null($search5) && !is_null($search6) && is_null($search7)) {
            $query->where('operating_schedule_design','=', $search6);
        }
        //施工のみ実施
        else if (is_null($search5) && is_null($search6) && !is_null($search7)) {
            $query->where('operating_schedule_Construction','=', $search7);
        }

        //社内報・SNS掲載許可の検索条件追加
        //掲載の許可あり
        if (!is_null($search8) && is_null($search9)) {
            $query->where('adv_permission','=', $search8);
        }
        //掲載の許可なし
        else if (is_null($search8) && !is_null($search9)) {
            $query->where('adv_permission','=', $search9);
        }

        $cqresults = $query->paginate(10);
        return view('app')->with('session', $session)->with('cqresults', $cqresults);
    }
}
