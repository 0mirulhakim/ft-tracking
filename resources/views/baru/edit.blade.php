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
            {{Form::text('nama', $permohonan->nama, ['class' => 'form-control', 'placeholder' => 'nama','disabled', 'style'=>'border:solid gray 1px'])}}
        </div>
                  <div class="form-group">
            {{Form::label('no_fail', 'No. Fail')}}
            {{Form::text('no_fail', $permohonan->no_fail, ['class' => 'form-control', 'placeholder' => 'no ic','disabled', 'style'=>'border:solid gray 1px'])}}
        </div>
        <div class="form-group">
            {{Form::label('tarikh', '*Tarikh')}}
            {{Form::date('tarikh',  old('tarikh', now()->format('Y-m-d')), ['class' => 'form-control', 'placeholder' => 'Tarikh','required', 'style'=>'border:solid gray 1px'])}}
            
        </div>
        <input type="hidden" id="no_fail" name="no_fail" value="{{$permohonan->no_fail}}">
        <input type="hidden" id="permohonan_id" name="permohonan_id" value="{{$permohonan->id}}">
        <input type="hidden" id="nama_staff" name="nama_staff" value="{{ Auth::user()->name }}">
                  <div class="form-group">
                  {{Form::label('status', 'Status ', [ 'class' => 'required' ])}}
        <select name="status"  class="form-control" style="border: 1px solid black"required>
    <option selected ><?php if( $permohonan->status_id == 1 ){
                                     echo "Permohonan Baru";
                        }else if( $permohonan->status_id == 2 ){
                                     echo "Maklumat tidak lengkap";
                        }else if( $permohonan->status_id == 3 ){
                                        echo "Permohonan Ukur(PU) - Tindakan JUPEM";
                        }else if( $permohonan->status_id == 4 ){
                                        echo "Semakan Perbezaan Keluasan Tanah ";
                        }else if( $permohonan->status_id == 5 ){
                                        echo "Proses Kelulusan Majlis MMKN";
                        }else if( $permohonan->status_id == 6 ){
                                        echo "Pendaftaran Hakmilik Baru (Hakmilik Pejabat Tanah)";
                        }else if( $permohonan->status_id == 7 ){
                                        echo "Pendaftaran Hakmilik Baru (Hakmilik PTGS)";
                        }else if( $permohonan->status_id == 8 ){
                                        echo "Sedia untuk diambil";
                        }else{
                                     echo "Terdapat masalah pada permohonan (sila hubungi Unit Teknikal & Penguatkuasa)";
                        }?></option>
    <option value="2">Maklumat tidak lengkap</option>
    <option value="3">Permohonan Ukur(PU) - Tindakan JUPEM</option>
    <option value="4">Semakan Perbezaan Keluasan Tanah</option>
    <option value="5">Proses Kelulusan Majlis MMKN</option>
    <option value="6">Pendaftaran Hakmilik Baru (Hakmilik Pejabat Tanah)</option>
    <option value="7">Pendaftaran Hakmilik Baru (Hakmilik PTGS)</option>
    <option value="8">Sedia untuk diambil</option>
    <option value="9">Terdapat masalah pada permohonan (sila hubungi Unit Teknikal & Penguatkuasa)</option>
  </select></div>
  <div class="form-group">
            {{Form::label('no_baru', 'Hakmilik No. Baru')}}
            {{Form::text('no_baru',$permohonan->no_baru, ['class' => 'form-control', 'placeholder' => 'no baru', 'style'=>'border:solid gray 1px'])}}
        </div>
  <div class="form-group">
            {{Form::label('catatan', 'Catatan')}}
            {{Form::textarea('catatan','', ['class' => 'form-control', 'placeholder' => 'catatan', 'style'=>'border:solid gray 1px'])}}
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
   