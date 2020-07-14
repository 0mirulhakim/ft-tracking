<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('laporan');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('permohonan_baru')
       ->join('status', 'status.id', '=', 'permohonan_baru.id')
       ->select('status.status_nama','permohonan_baru.*')
         ->where('no_fail', 'like', '%'.$query.'%')
         ->orWhere('nama', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
        $data = DB::table('permohonan_baru')
        ->join('status', 'status.id', '=', 'permohonan_baru.id')
        ->select('status.status_nama','permohonan_baru.*')
        ->get();
     }
     $total_row = $data->count();
     if($total_row > 0)
     {
      foreach($data as $row)
      {
       $output .= '
       <tr>
        <td>'.$row->no_fail.'</td>
        <td>'.$row->nama.'</td>
        <td>'.$row->no_rujukan.'</td>
        <td>'.$row->status_nama.'</td>
        <td>'.$row->no_lot.'</td>
        <td>'.$row->tarikh.'</td>
       </tr>
       ';
      }
     }
     else
     {
      $output = '
      <tr>
       <td align="center" colspan="5">No Data Found</td>
      </tr>
      ';
     }
     $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
     );

     echo json_encode($data);
    }
   }
}
