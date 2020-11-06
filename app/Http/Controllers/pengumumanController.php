<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use DB;

use App\Homepage;
class pengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
        $posts = DB::select('SELECT * FROM homepages where id="1"');
        return view('info')->with('posts',$posts);;
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
        $users = Homepage::find($id);
         //Handle File Upload
  if($request->hasFile('gambar1')){
    $usersImage = public_path("storage/gambar1/{$users->gambar1}"); // get previous image from folder
    if (Homepage::exists($usersImage)) { // unlink or remove previous image from folder
        unlink($usersImage);
    }
    //Get filename with the extension
     $filenamewithExt = $request->file('gambar1')->getClientOriginalName();
     
    //Get just filename
    $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    
    //Get just ext
    $extension = $request->file('gambar1')->guessClientExtension();
    
    //FileName to store
    $fileNameToStore =  $filename.'_'.time().'.'.$extension;
    
    //Upload Image
    $path = $request->file('gambar1')->storeAs('public/gambar1/',$fileNameToStore);
        } else {
            $fileNameToStore = $request->input('data');
        }

          //Handle File Upload
  if($request->hasFile('gambar2')){
    $usersImage = public_path("storage/gambar2/{$users->gambar2}"); // get previous image from folder
    if (Homepage::exists($usersImage)) { // unlink or remove previous image from folder
        unlink($usersImage);
    }
    //Get filename with the extension
     $filenamewithExt = $request->file('gambar2')->getClientOriginalName();
     
    //Get just filename
    $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    
    //Get just ext
    $extension = $request->file('gambar2')->guessClientExtension();
    
    //FileName to store
    $fileNameToStore1 =  $filename.'_'.time().'.'.$extension;
    
    //Upload Image
    $path = $request->file('gambar2')->storeAs('public/gambar2/',$fileNameToStore1);
        } else {
            $fileNameToStore1 = $request->input('data1');
        }
        
        
        $posts=new Homepage;
        //$post=Homepage::find($id);
        $posts=Homepage::find($request->input('id'));
        $posts->gambar1=$fileNameToStore;
        $posts->gambar2=$fileNameToStore1;
        $posts->save(); 
        
        return redirect('info')->with('success','Info telah dikemaskini.');
        
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
