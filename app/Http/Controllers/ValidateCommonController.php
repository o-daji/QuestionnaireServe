<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateCommonController extends Controller
{
    //バリデーションルール

    public function customrule()
    {

        $rulus = [
            'construction_no' => 'required',
            'customer_name' => 'required',
            'operating_date_st' => 'required',
            'operating_date_ed' => 'required',
            'construction_no' => 'required',
          ];
        return $rulus;
    }


    //メッセージ
    public function custommsg()
    {
        $message = [
            'construction_no.required' => '工事番号を入力してください',
            'customer_name.required' => '顧客名を入力してください',
            'operating_date_st.required' => '開始日を入力してください',
            'operating_date_ed.required' => '終了日を入力してください',
          ];
        return $message;
    }


}
