<?php

namespace App\Http\Controllers;
use App\Mukim;
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
        $mukims= Mukim::select('id','nama')->get();
        return view('home',compact('mukims'));
        
    }
}
