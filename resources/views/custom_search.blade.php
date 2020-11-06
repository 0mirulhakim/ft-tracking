
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin FT-Tracking</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
   
    <link href="{{asset('tim/assets/css/light-bootstrap-dashboard.css?v=2.0.0 ')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('tim/assets/css/demo.css')}}" rel="stylesheet" />
</head>
<style>
.red {
  color: red;
}
</style>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{asset('tim/assets/img/sidebar-5.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <img src="{{ asset('tim/assets/img/jataselangor.png') }}" alt="selangor" class="brand-image"
                    style="height: 60px; width: 50px;">
                    <a  href="{{ url('/home') }}" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="brand-text font-weight-bold"style="color:black">PDT Klang</span> <span class="caret"></span>
                                </a> 
                </div>
               
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Permohonan </p>
                        </a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('sejarah') }}">
                            <i class="nc-icon nc-icon nc-notes"></i>
                            <p>Sejarah Kemaskini </p>
                        </a>
                    </li>
              <li class="nav-item active">
                        <a class="nav-link" href="{{ url('customsearch') }}">
                            <i class="nc-icon nc-icon nc-notes"></i>
                            <p>Laporan </p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('info') }}">
                            <i class="nc-icon nc-icon nc-notes"></i>
                            <p>Kemaskini Info</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/home') }}">FT-Tracking</a>
                   
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav navbar-right">
                        
                        
                            <li class="nav-item">
                            <a class="navbar-brand" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                                <a style="float:right;" class="navbar-brand" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                <main class="py-4">
           
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="">    
     <br />
     <h3 align="center">Laporan Final Title</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_tahun" id="filter_tahun" class="form-control" required>
                            <option value="">Pilih Tahun</option>
                            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                            <option value="{{ date('Y')-1 }}">{{ date('Y')-1 }}</option>
                            <option value="{{ date('Y')-2 }}">{{ date('Y')-2 }}</option>
                            <option value="{{ date('Y')-3 }}">{{ date('Y')-3 }}</option>
                            <option value="{{ date('Y')-4 }}">{{ date('Y')-4 }}</option>
                            <option value="{{ date('Y')-5 }}">{{ date('Y')-5 }}</option>
                            <option value="{{ date('Y')-6 }}">{{ date('Y')-6 }}</option>
                        </select>
                    </div>
                    
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
            <th>No. Fail</th>
            <th>No.Rujukan</th>
            <th>Nama Pemohon</th>
            <th>No. PA</th>
            <th>No. Lot/Mukim</th>
            <th>Hakmilik No.Baru</th>
            <th>Status</th>
            <th>Tarikh</th>
            
                        </tr>
                    </thead>
                </table>
   </div>
            <br />
            <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_tahun = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_tahun:filter_tahun}
            },
            columns: [
                {
                    data:'no_fail',
                    name:'no_fail'
                },
                {
                    data:'no_rujukan',
                    name:'no_rujukan'
                },
                {
                    data:'nama',
                    name:'nama'
                    
                },
                {
                    data:'no_pa',
                    name:'no_pa'
                    
                },
                {   data: "no_lot",
        render: function ( data, type, row ) {
            return row.no_lot + '<br> ' + row.nama_mukim ;
        }
    },
                {
                    data:'no_baru',
                    name:'no_baru',
                    "className": "red"
                    
                },
                {
                    data:'status_nama',
                    name:'status_nama'
                },
               
                {
                    data:'tarikh',
                    name:'tarikh'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_tahun = $('#filter_tahun').val();

        if(filter_tahun != '' &&  filter_tahun != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_tahun);
        }
        else
        {
            alert('Select filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_tahun').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
        </main>
                 
                    <div class="section">
                   </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
        
    </div>
   
            

           


            

            
        </ul>
    </div>
</div>
 
</body>
<!--   Core JS Files   -->


</html>