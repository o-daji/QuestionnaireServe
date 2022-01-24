<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;

class CqdetailviewController extends Controller
{
    /**
     * 詳細画面の表示
     */
    public function detailshow($cqid)
    {
        $cqdetail = Cqresult::find($cqid);

        return view('detail', compact('cqdetail'));
    }

}
