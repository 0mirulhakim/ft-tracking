<?php use App\Post; ?>
<style>



button{
    float:right;
    display:inline
   
}



</style>

<body>



@extends('layouts.admin')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

    <h1 style="margin-left: 15px"> Semakan Keluasan Tanah (KPPT)</h1>
    @if (count($permohonan)>0)
    @foreach($permohonan as $permohonans)
 
               
                    <div class="card p-3 mt-3 mb-3 bg-dark text-white" >        
                  
<a  href="{{route('baru.edit', $permohonans->id)}}">{{$permohonans->nama}}</a>
<p class="text-white"> No. Fail    : {{$permohonans->no_fail}}</p>
<p class="text-white"> No. Rujukan    : {{$permohonans->no_rujukan}}</p>

  
            </div>
    @endforeach
    
    @else
        <p>Tiada Permohonan Baru</p>
        @endif
  @endsection    
