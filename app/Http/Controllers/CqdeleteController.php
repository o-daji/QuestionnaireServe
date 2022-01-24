<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cqresult;

class CqdeleteController extends Controller
{
    //削除を行う
    public function delete($cqid)
    {
        $cqresult = Cqresult::findOrFail($cqid);

        $cqresult->delete();  // ←★投稿削除実行

        return redirect('/top')->with('statusmessage', "アンケートID{$cqid}を削除しました");
    }
}
