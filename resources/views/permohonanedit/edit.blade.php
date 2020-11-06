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
   <!-- Main content -->
   <section  class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Kemaskini Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
    {!! Form::open(['action' => 'PermohonanEditController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  
        @csrf    
        <div class="form-group">
            {{Form::label('nama', 'Nama', [ 'class' => 'required' ])}}
            {{Form::text('nama', $permohonan->nama, ['class' => 'form-control', 'placeholder' => 'nama', 'style'=>'border:solid gray 1px'])}}
        </div>
                  <div class="form-group">
            {{Form::label('no_fail', 'No. Fail', [ 'class' => 'required' ])}}
            {{Form::text('no_fail', $permohonan->no_fail, ['class' => 'form-control', 'placeholder' => 'no ic', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_rujukan', 'No. Rujukan', [ 'class' => 'required' ])}}
            {{Form::text('no_rujukan', $permohonan->no_rujukan, ['class' => 'form-control', 'placeholder' => 'no ic', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_lot', 'No. Lot', [ 'class' => 'required' ])}}
            {{Form::text('no_lot', $permohonan->no_lot, ['class' => 'form-control', 'placeholder' => 'no ic', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_pa', 'No. PA', [ 'class' => 'required' ])}}
            {{Form::text('no_pa', $permohonan->no_pa, ['class' => 'form-control', 'placeholder' => 'no ic', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('tarikh', '*Tarikh')}}
            {{Form::date('tarikh',  old('tarikh', now()->format('Y-m-d')), ['class' => 'form-control', 'placeholder' => 'Tarikh','required', 'style'=>'border:solid gray 1px'])}}
            
        </div>
       <!-- <div class="form-group">
            {{Form::label('mukim_id', 'Mukim', [ 'class' => 'required' ])}}
            {{Form::text('mukim_id', $permohonan->mukim_id, ['class' => 'form-control', 'placeholder' => 'no ic', 'style'=>'border:solid gray 1px'])}}
        </div>-->
        <div class="form-group">
                  {{Form::label('mukim_id', 'Mukim ', [ 'class' => 'required' ])}}
        <select name="mukim_id"  class="form-control" style="border: 1px solid black"required>
    <option value="{{$permohonan->mukim_id}}" selected ><?php if( $permohonan->mukim_id == 1 ){
                                     echo "Mukim Kapar";
                         }else if( $permohonan->status_id == 2 ){
                                      echo "Mukim Klang";
                         }else if( $permohonan->mukim_id == 3 ){
                                         echo "Mukim Bukit Raja ";
                         }else if( $permohonan->mukim_id == 4 ){
                                         echo "Mukim Damansara ";
                         }else if( $permohonan->mukim_id == 5 ){
                                         echo "Bandar Klang ";
                         }else if( $permohonan->mukim_id == 6 ){
                                         echo "Bandar Port Swettenham";
                         }else if( $permohonan->mukim_id == 7 ){
                                         echo "Bandar Sultan Sulaiman";
                         }else if( $permohonan->mukim_id == 8 ){
                                         echo "Bandar Shah Alam";
                         }else if( $permohonan->status_id == 9 ){
                                          echo "Pekan Bukit Kemuning";
                         }else if( $permohonan->mukim_id == 10 ){
                                             echo "Pekan Kapar";
                         }else if( $permohonan->mukim_id == 11 ){
                                             echo "Pekan Meru ";
                         }else if( $permohonan->mukim_id == 12 ){
                                             echo "Pekan Teluk Menegun ";
                         }else if( $permohonan->mukim_id == 13 ){
                                             echo "Pekan Batu Empat";
                         }else if( $permohonan->mukim_id == 14 ){
                                             echo "Pekan Pandamaran ";
                         }else if( $permohonan->mukim_id == 15 ){
                                             echo "Pekan Pulau Ketam";
                         }else if( $permohonan->mukim_id == 16 ){
                                              echo "Pekan Seaport";
                         }else{
                                     echo "Pekan Batu Tiga";
                        }?></option>
    <option value="1">Mukim Kapar</option>
    <option value="2">Mukim Klang </option>
    <option value="3">Mukim Bukit Raja </option>
    <option value="4">Mukim Damansara </option>
    <option value="5">Bandar Klang </option>
    <option value="6">Bandar Port Swettenham </option>
    <option value="7">Bandar Sultan Sulaiman </option>
    <option value="8">Bandar Shah Alam </option>
    <option value="9">Pekan Bukit Kemuning </option>
    <option value="10">Pekan Kapar </option>
    <option value="11">Pekan Meru </option>
    <option value="12">Pekan Teluk Menegun </option>
    <option value="13">Pekan Batu Empat </option>
    <option value="14">Pekan Pandamaran </option>
    <option value="15">Pekan Pulau Ketam </option>
    <option value="16">Pekan Seaport </option>
    <option value="17">Pekan Batu Tiga </option>
    
  </select></div>
   <!--    <div class="form-group">
            {{Form::label('mukim_id', 'Mukim', [ 'class' => 'required' ])}}
            <select name="mukim_id"  class="form-control" style="border: 1px solid black"required>
            <option value="{{$permohonan->mukim_id}}" selected ><?php if( $permohonan->mukim_id == 1 ){
                                     echo "Kapar";
                       
                        }else{
                                     echo "Klang";
                        }?></option>
                        
     <option value="1">Klang</option>
    <option value="2">Kapar</option>
  </select></div>-->
        <input type="hidden" id="permohonan_id" name="permohonan_id" value="{{$permohonan->id}}">
        <input type="hidden" id="status_id" name="status_id" value="{{$permohonan->status_id}}">
        <input type="hidden" id="nama_staff" name="nama_staff" value="{{ Auth::user()->name }}">
                 
  <div class="form-group">
            {{Form::label('no_baru', 'Hakmilik No. Baru')}}
            {{Form::text('no_baru',$permohonan->no_baru, ['class' => 'form-control', 'placeholder' => 'no baru', 'style'=>'border:solid gray 1px'])}}
        </div>
  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                </div>
              </form>
            </div>
          </div>         
            </div></div>
      </div>
    </section>
@endsection
   