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

Auth::routes(['register' => false]);
Route::get('/', function () {
    $homes = DB::table('homepages')->get();
    return view('welcome', ['homes' => $homes]);
});
Route::post ( '/search', function () {
    
    $q =Request::get ( 'q' );
    $user = DB::table('permohonan_baru')     
    ->join('status', 'status.id', '=', 'permohonan_baru.status_id')->where( 'permohonan_baru.no_fail', 'LIKE', '%' . $q . '%' )
    ->select('permohonan_baru.id','status.status_nama','permohonan_baru.no_fail','permohonan_baru.status_id','permohonan_baru.no_rujukan', 'permohonan_baru.nama', 'permohonan_baru.no_lot', 'permohonan_baru.catatan', 'permohonan_baru.tarikh')
    ->get();
     if (count ( $user ) > 0)
        return view ( 'welcome1' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome1' )->withErrors ('No.fail tidak wujud' );
        
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
Route::group(['middleware' => ['auth']], function() {
   
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/info', function () {
    return view('info');
});
Route::get('/registerstaff', function () {
    return view("registerstaff");
});
//Auth::routes();
Route::get('/info', 'pengumumanController@index')->name('info');
Route::resource('registerstaffs', 'RegisterstaffController');
Route::get('/permohonans', 'BaruController@index')->name('permohonans');
Route::get('/transaksi', 'PermohonanController@index')->name('transaksi');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sejarah', 'SejarahController@index')->name('sejarah');
Route::resource('baru', 'PermohonanController');
Route::resource('permohonanedit', 'PermohonanEditController');
Route::get('/edit', [ 'as' => 'permohonanedit.edit', 'uses' => 'PermohonanEditController@edit']);
Route::resource('jupem', 'JupemController');
Route::resource('kppt', 'KpptController');
Route::resource('majlis', 'MajlismesyuaratController');
Route::resource('hakmilik', 'HakmilikController');
Route::resource('status', 'StatusController');
Route::get('/laporan', 'LiveSearch@index');
Route::get('/laporan/action', 'LiveSearch@action')->name('laporan.action');
Route::resource('customsearch', 'CustomSearchController');
Route::resource('pegumuman', 'pengumumanController');



Route::post ( '/tracking', function () {
    $q =Request::get ( 'q' );
    $user = DB::table('status_permohonan')     
    ->join('status', 'status.id', '=', 'status_permohonan.status')
    ->join('permohonan_baru', 'permohonan_baru.id', '=', 'status_permohonan.permohonan_baru_id')
    ->where( 'status_permohonan.permohonan_baru_id', 'LIKE', '%' . $q . '%' )
    ->select('status_permohonan.*','status.status_nama','permohonan_baru.no_fail')
    ->get();
     if (count ( $user ) > 0)
        return view ( 'track' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'track' )->withErrors ('No.fail tidak wujud' );
        
} );
Route::post ( '/tahun', function () {
    
    $q =Request::get ( 'q' );
   
        $data = DB::table('permohonan_baru')->orderBy('created_at','desc') //->orderBy('tarikh','desc') 
        ->whereYear( 'tarikh', 'LIKE', '%' . $q . '%' )
        ->join('status', 'status.id', '=', 'permohonan_baru.status_id')
        ->join('mukim', 'mukim.id', '=', 'permohonan_baru.mukim_id')
        ->select('status.status_nama','permohonan_baru.*','mukim.nama_mukim')    
        ->get();
        return view('home', compact('data')); 
} );

});