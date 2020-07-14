<?php

namespace App\Http\Controllers;
use DB;
use App\Status;
use App\Status_permohonan;
use App\Permohonan;
use Illuminate\Http\Request;

class KpptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permohonan = DB::select('SELECT * FROM permohonan_baru where status_id="3" ');
        return view('kppt.index')->with('permohonan',$permohonan);
        
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
        $post=new Status_permohonan;
        $post->permohonan_baru_id=$request->input('permohonan_id');
        $post->tarikh=$request->input('tarikh');
        $post->nama_staff=$request->input('nama_staff');
        $post->catatan=$request->input('catatan');
        $post->status=$request->input('status');
        
        $post->save(); 

        //update table
        $permohonan=new Permohonan;
        $permohonan=Permohonan::find($request->permohonan_id);
        $permohonan->status_id=$request->status;
        $permohonan->catatan=$request->catatan;
        $permohonan->tarikh=$request->tarikh;
        $permohonan->save();
        return redirect('home')->with('success','Data telah dikemaskini.');
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
        //
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
    public function destroy($id)
    {
        //
    }
}
