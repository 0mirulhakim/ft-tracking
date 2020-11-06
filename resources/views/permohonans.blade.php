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
            {{Form::text('no_fail', '', ['class' => 'form-control', 'placeholder' => 'no.fail','required', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('tarikh', '*Tarikh')}}
            {{Form::date('tarikh',  old('tarikh', now()->format('Y-m-d')), ['class' => 'form-control', 'placeholder' => 'Tarikh','required', 'style'=>'border:solid gray 1px'])}}
            
        </div>
        <div class="form-group">
            {{Form::label('no_rujukan', 'No. Rujukan', [ 'class' => 'required' ])}}
            {{Form::text('no_rujukan', '', ['class' => 'form-control', 'placeholder' => 'no.rujukan','required', 'style'=>'border:solid gray 1px' ])}}
        </div>
        <div class="form-group">
            {{Form::label('nama', 'Nama Pemohon', [ 'class' => 'required' ])}}
            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'nama','required', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_pa', 'No. PA', [ 'class' => 'required' ])}}
            {{Form::text('no_pa', '', ['class' => 'form-control', 'placeholder' => 'no.pa ','required', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_lot', 'No. Lot ', [ 'class' => 'required' ])}}
            {{Form::text('no_lot', '', ['class' => 'form-control', 'placeholder' => 'no. lot','required', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
        {{Form::label('mukim_id', 'Mukim ', [ 'class' => 'required' ])}}
        <select name="mukim_id" class="form-control" style="border: 1px solid black"required>
        <option value="" disabled selected>--pilih mukim--</option>
        @foreach($mukims as $mukim)
         <option value="{{ $mukim->id}}">{{ $mukim->nama_mukim}}</option>
        @endforeach
    </select>
       </div>
  <div class="form-group">
            {{Form::label('catatan', 'Catatan')}}
            {{Form::textarea('catatan', '', ['class' => 'form-control', 'placeholder' => 'catatan', 'style'=>'border:solid gray 1px'])}}
        </div>
        <input type="hidden" id="status" name="status_id" value="1">
      
<div>
 </div> 
 
<br><br>
    </body>
</html>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <button onclick="goBack()" class="btn btn-primary float-right" >Kembali</button>
    <script>
function goBack() {
  window.history.back();
}
</script>
@endsection
</div></div></div></div>
