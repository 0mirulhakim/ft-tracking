<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomSearchController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->filter_tahun))
      {
        $data = DB::table('permohonan_baru')
        ->join('status', 'status.id', '=', 'permohonan_baru.id')
        ->select('status.status_nama','permohonan_baru.*')         
         ->whereYear('permohonan_baru.tarikh', $request->filter_tahun)
         ->get();
      }
      else
      {
        $data = DB::table('permohonan_baru')
        ->join('status', 'status.id', '=', 'permohonan_baru.id')
        ->select('status.status_nama','permohonan_baru.*')
        ->get();
      }
      return datatables()->of($data)->make(true);
      
     }
     $status_name = DB::table('permohonan_baru')
          ->join('status', 'status.id', '=', 'permohonan_baru.id')
          ->select('status.status_nama','permohonan_baru.*')  
          ->get();
     return view('custom_search', compact('status_name'));
    }
}

?>