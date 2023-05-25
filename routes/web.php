<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\UserController as ApiUserControlleer;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/keanggotaan', [App\Http\Controllers\UserController::class, 'index'])->name('anggota.index');
Route::post('/keanggotaan', [App\Http\Controllers\UserController::class, 'store'])->name('anggota.post');

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'anggota'], function () {
        Route::post('/datatable', [ApiUserControlleer::class, 'index'])->name('api.anggota.index');
    });
});

Route::group(['prefix' => 'member'], function () {
    Route::get('/', [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');
    

    Route::group(['prefix' => 'report_member'], function () {
        Route::get('/{id}', [App\Http\Controllers\ReportMemberController::class, 'index'])->name('report_member.index');
        Route::post('/', [App\Http\Controllers\ReportMemberController::class, 'store'])->name('report_member.store');
    });
});
