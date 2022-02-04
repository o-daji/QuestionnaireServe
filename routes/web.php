<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CqresultSearchController;
use App\Http\Controllers\CqdetailviewController;
use App\Http\Controllers\CqstoreController;
use App\Http\Controllers\CqdeleteController;
use App\Http\Controllers\CqeditController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $err = $request->session()->get('err');
    $request->session()->forget('err');
    
    return view('login', [
        'err' => $err,
    ]);
});

/** ログイン＆ログアウト**/    
// ログイン処理
Route::post('/login', [TopController::class, 'loginPost'])->name('/login');
//ログアウト処理
Route::get('/logout', [TopController::class, 'logout'])->name('/logout');

// トップ画面(アンケート一覧)遷移
Route::get('/top', [TopController::class, 'topView']);

// トップ画面(アンケート一覧)遷移
Route::get('/top/select', [CqresultSearchController::class, 'selectCqresultCondition']);

//アンケート詳細
Route::get('/detail/{cqid}', [CqdetailviewController::class, 'detailshow'])->name('detail');

//アンケート登録画面遷移
Route::get('/store', [CqstoreController::class, 'store'])->name('store');
//アンケート登録実行
Route::post('/store', [CqstoreController::class, 'cqDataStore']);

//アンケート編集画面遷移
Route::get('/edit/{cqid}', [CqeditController::class, 'editshow'])->name('edit');
//アンケート編集実行
Route::post('/edit/{cqid}', [CqeditController::class, 'edit'])->name('edit');


//アンケート削除
Route::post('/delete/{cqid}', [CqdeleteController::class, 'delete'])->name('delete');