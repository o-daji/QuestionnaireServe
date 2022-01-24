<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cqresult extends Model
{
    use HasFactory;
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'm_cqresult';

    /**
     * テーブルの主キー
     *
     * @var string
     */
    protected $primaryKey = 'cqid';

    protected $guarded = ['cqid'];

        //工事番号LIKE検索
        public static function likeSearchConstructionNo($constructionNo){
            $select = 'name';
            if ($constructionNo  != '') {
                $Cqresult = Cqresult::where($select, 'like', "%$constructionNo%")->pluck('id',$select);
                return $Cqresult;
            }
        }
}
