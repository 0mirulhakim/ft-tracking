<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('permohonan_baru')->orderBy('created_at','desc') //->orderBy('tarikh','desc') 
        ->whereYear('tarikh',date('Y'))
        ->join('status', 'status.id', '=', 'permohonan_baru.status_id')
        ->join('mukim', 'mukim.id', '=', 'permohonan_baru.mukim_id')
        ->select('status.status_nama','permohonan_baru.*','mukim.nama_mukim')    
        ->get();
        return view('home', compact('data'));
        
    }
}
