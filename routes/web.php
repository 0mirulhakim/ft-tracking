<?php

use Illuminate\Support\Facades\Route;
use App\Permohonan;

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
    return view('welcome');
});
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/home1', function () {
    return view('home1');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('baru', 'PermohonanController');
Route::resource('jupem', 'JupemController');
Route::resource('kppt', 'KpptController');
Route::resource('majlis', 'MajlismesyuaratController');
Route::resource('status', 'StatusController');
Route::get('/laporan', 'LiveSearch@index');
Route::get('/laporan/action', 'LiveSearch@action')->name('laporan.action');
Route::resource('customsearch', 'CustomSearchController');
Route::post ( '/search', function () {
    $q =Request::get ( 'q' );
    $user = DB::table('permohonan_baru')     
    ->join('status', 'status.id', '=', 'permohonan_baru.status_id')->where( 'permohonan_baru.no_fail', 'LIKE', '%' . $q . '%' )
    ->select('permohonan_baru.id','status.status_nama','permohonan_baru.no_fail','permohonan_baru.status_id','permohonan_baru.no_rujukan', 'permohonan_baru.nama', 'permohonan_baru.no_lot', 'permohonan_baru.catatan', 'permohonan_baru.tarikh')
    ->get();
     if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome' )->withErrors ('No.fail tidak wujud' );
        
} );
Route::post ( '/search1', function () {
    $q =Request::get ( 'q' );
    $user = DB::table('status_permohonan')     
    ->join('status', 'status.id', '=', 'status_permohonan.status')
    ->join('permohonan_baru', 'permohonan_baru.id', '=', 'status_permohonan.permohonan_baru_id')
    ->where( 'status_permohonan.permohonan_baru_id', 'LIKE', '%' . $q . '%' )
    ->select('status_permohonan.*','status.status_nama','permohonan_baru.no_fail')
    ->get();
     if (count ( $user ) > 0)
        return view ( 'status' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'status' )->withErrors ('No.fail tidak wujud' );
        
} );