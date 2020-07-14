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
    {!! Form::open(['action' => 'KpptController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  
        @csrf    
        <div class="form-group">
            {{Form::label('nama', 'Nama')}}
            {{Form::text('nama', $permohonan->nama, ['class' => 'form-control', 'placeholder' => 'nama','disabled'])}}
        </div>
                  <div class="form-group">
            {{Form::label('no_ic', 'No. Fail')}}
            {{Form::text('no_ic', $permohonan->no_fail, ['class' => 'form-control', 'placeholder' => 'no ic','disabled'])}}
        </div>
        <div class="form-group">
           {{Form::label('tarikh', 'Tarikh ', [ 'class' => 'required' ])}}
            {{Form::date('tarikh', '', ['class' => 'form-control', 'placeholder' => 'Tarikh','required'])}}
        </div>  
        <input type="hidden" id="permohonan_id" name="permohonan_id" value="{{$permohonan->id}}">
        <input type="hidden" id="nama_staff" name="nama_staff" value="{{ Auth::user()->name }}">
                  <div class="form-group">
                  {{Form::label('status', 'Status ', [ 'class' => 'required' ])}}
        <select name="status" class="custom-select mb-3" >
    <option selected ><?php if( $permohonan->status_id == 1 ){
                                     echo "Baru";
                        }else if( $permohonan->status_id == 2 ){
                                     echo "Tindakan JUPEM";
                        }else if( $permohonan->status_id == 3 ){
                                        echo "Semakan Keluasan Tanah (KPPT)";
                        }else if( $permohonan->status_id == 4 ){
                                        echo "Mohon Kelulusan ke Majlis Mesyuarat Kerajaan Negeri/Pentadbir Tanah";
                        }else{
                                     echo "Proses Cetakan Hakmilik Akhir(Selesai)";
                        }?></option>
    <option value="2">Tindakan JUPEM </option>
    <option value="3">Semakan Keluasan Tanah (KPPT)</option>
    <option value="4">Mohon Kelulusan ke Majlis Mesyuarat Kerajaan Negeri/Pentadbir tanah</option>
    <option value="5">Proses Cetakan Hakmilik Akhir(Selesai)</option>
  </select></div>
  <div class="form-group">
            {{Form::label('catatan', 'Catatan')}}
            {{Form::textarea('catatan','', ['class' => 'form-control', 'placeholder' => 'catatan'])}}
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
   