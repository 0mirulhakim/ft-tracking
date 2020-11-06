<?php

namespace App\Http\Controllers;
use App\Permohonan;
use App\Status_permohonan;
use App\Transaksi;

use Illuminate\Http\Request;
use DB;
class PermohonanEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $permohonan=new Permohonan;
        $permohonan=Permohonan::find($request->input('permohonan_id'));
        $permohonan->no_fail=$request->input('no_fail');
        $permohonan->no_rujukan=$request->input('no_rujukan');
        $permohonan->nama=$request->input('nama');
        $permohonan->no_pa=$request->input('no_pa');
        $permohonan->no_lot=$request->input('no_lot'); 
        $permohonan->mukim_id=$request->input('mukim_id');
        $permohonan->tarikh=$request->input('tarikh');
        $permohonan->status_id=$request->input('status_id');
        $permohonan->no_baru=$request->input('no_baru');
        $permohonan->save();
        
        
        $post=new Status_permohonan;
        $post_id = $request->input('permohonan_id');
        $post = Status_permohonan::where('permohonan_baru_id', $post_id)->update(['no_fail'=>$request->input('no_fail')]);
      
        
        return redirect('/home')->with('success',"Data telah berjaya dikemaskini");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permohonan= Permohonan::find($id);
       
   
        return view ('permohonanedit.edit')->with('permohonan',$permohonan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    { 
        $post= Status_permohonan::select('id','nama_staff','catatan','status','tarikh')
         ->where('permohonan_baru_id', '=', $id );
         $post->delete();
        //$permohonan = Permohonan::find($id);
        Permohonan::where('id', $id)->delete();
        //$permohonan->delete();
        $permohonan=new Transaksi;
        $permohonan->no_fail=$request->input('no_fail');
        $permohonan->nama_staff=$request->input('nama_staff');
        $permohonan->status=$request->input('status');
        $permohonan->tarikh=$request->input('tarikh');
        $permohonan->save();
        return redirect('/home')->with('success',"Data telah berjaya dipadam");
    
    }
}
