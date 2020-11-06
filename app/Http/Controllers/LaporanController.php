<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function index()
        {
            return view('live_search');
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
             ->where('CustomerName', 'like', '%'.$query.'%')
             ->orWhere('Address', 'like', '%'.$query.'%')
             ->orWhere('City', 'like', '%'.$query.'%')
             ->orWhere('PostalCode', 'like', '%'.$query.'%')
             ->orWhere('Country', 'like', '%'.$query.'%')
             ->orderBy('CustomerID', 'desc')
             ->get();
             
          }
          else
          {
           $data = DB::table('permohonan_baru')
             //->orderBy('CustomerID', 'desc')
           //  ->get();
             ->join('status', 'status.id', '=', 'permohonan_baru.status_id')
    //->join('mukim', 'mukim.id', '=', 'permohonan_baru.mukim_id')
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
}