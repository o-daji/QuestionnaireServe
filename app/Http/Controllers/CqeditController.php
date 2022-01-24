<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;


class CqeditController extends Controller
{
    //編集画面を返す。
    public function editshow($cqid)
    {
        $cqedit = Cqresult::find($cqid);

        return view('edit', compact('cqedit'));
    }
    //編集内容の更新を実行。
    public function edit($cqid)
    {
        $cqedit = Cqresult::find($cqid);



        

        return view('edit', compact('cqedit'));
    }
}
