@extends('layouts.admin')

@section('content')

<style>
label.required:after {
    color: #cc0000;
    content: "*";
    font-weight: bold;
    margin-left: 5px;
}


</style>
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

  @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
    <h4>Permohonan Baru</h4>
    <div class="container">
  <div class="card-deck">
    <div class="card bg-light">
    <div class="card-body text-left">
    {!! Form::open(['action' => 'PermohonanController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <h2>Butiran Pemohon</h2>
        <div class="form-group">
        {{Form::label('no_fail', 'No. Fail', [ 'class' => 'required' ])}}
            {{Form::text('no_fail', '', ['class' => 'form-control', 'placeholder' => 'no.fail','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('tarikh', 'Tarikh', [ 'class' => 'required' ])}}
            {{Form::date('tarikh', '', ['class' => 'form-control', 'placeholder' => 'Tarikh','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_rujukan', 'No. Rujukan', [ 'class' => 'required' ])}}
            {{Form::text('no_rujukan', '', ['class' => 'form-control', 'placeholder' => 'no.rujukan','required' ])}}
        </div>
        <div class="form-group">
            {{Form::label('nama', 'Nama Pemohon', [ 'class' => 'required' ])}}
            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'nama','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_pa', 'No. PA', [ 'class' => 'required' ])}}
            {{Form::text('no_pa', '', ['class' => 'form-control', 'placeholder' => 'no.pa ','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_lot', 'No. Lot ', [ 'class' => 'required' ])}}
            {{Form::text('no_lot', '', ['class' => 'form-control', 'placeholder' => 'no. lot','required'])}}
        </div>
        <div class="form-group">
        {{Form::label('mukim_id', 'Mukim ', [ 'class' => 'required' ])}}
        <select name="mukim_id">
        @foreach($mukims as $mukim)
         <option value="{{ $mukim->id}}">{{ $mukim->nama}}</option>
        @endforeach
    </select>
        <!--<select name="mukim_id" class="custom-select " >
    <option selected ></option>
    <option value="1"> 1</option>
    <option value="2">2</option>
    <option value="3"> 3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>--></div>
  <div class="form-group">
            {{Form::label('catatan', 'Catatan')}}
            {{Form::textarea('catatan', '', ['class' => 'form-control', 'placeholder' => 'catatan'])}}
        </div>
        <input type="hidden" id="status" name="status_id" value="1">
      
<div>
 </div> 
 
<br><br>
    </body>
</html>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
</div></div></div></div>
