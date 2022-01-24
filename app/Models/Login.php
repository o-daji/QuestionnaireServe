<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'm_user';

    protected $fillable = [
        'login_user_id',
        'password',
    ];
    
    /*
     * ログイン処理
     */
    public static function getUserInfo($login_user_id) {

        $select ="login_user_id";
        $user = Login::where($select,$login_user_id)->first();

        return $user;
    }
}
