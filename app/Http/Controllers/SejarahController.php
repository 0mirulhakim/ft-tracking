<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('permohonan_baru')
        
       ->join('status_permohonan', 'status_permohonan.permohonan_baru_id', '=', 'permohonan_baru.id')->whereYear('status_permohonan.tarikh',date('Y')) ->whereNotNull('nama_staff')//->where('nama_staff', '=', Auth::user()->name )
       ->join('status', 'status.id', '=', 'status_permohonan.status')
       ->select('status.status_nama','status_permohonan.permohonan_baru_id','permohonan_baru.nama','status_permohonan.id', 'status_permohonan.catatan', 'status_permohonan.nama_staff', 'status_permohonan.tarikh','status_permohonan.no_fail')
       ->get();
        return view('sejarah', compact('data'));
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
        //
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
