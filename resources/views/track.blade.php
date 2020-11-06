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
    <link href="{{asset('tim/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('tim/assets/css/light-bootstrap-dashboard.css?v=2.0.0 ')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('tim/assets/css/demo.css')}}" rel="stylesheet" />
</head>

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
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            
                            
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            
                        
                            <li class="nav-item">
                                <a class="navbar-brand" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                                <a class="nav-link" href="{{ route('logout') }}"
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
                <head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
</head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: gray;
  color: black;
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
<div class="row">
    <div class="col-lg-12">
         <h4>Senarai Permohonan</h4>
        <a href="{{ route('permohonans') }}"class="btn btn-secondary float-right" style="margin-right: 100px"><i class="nc-icon nc-icon nc-simple-add"></i>  Permohonan</a>
    </div>
</div>
   <br>
    <div class="container">
  <div class="card-deck">
    <div class="card bg-light">
    <div class="card-body text-left">
    @if(isset($details))
    <table class="pure-table" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th>Bil</th>
                <th>Tarikh</th>
                <th>Status</th>
                <th>Nama Staff</th>
                <th>Catatan</th>
                

            </tr>
        </thead>
        <tbody>
        @foreach($details as $permohonan1=> $permohonan)
              <tr style='font-family:"Courier New", Courier, monospace; font-size:80%'>
                
              <td>{{ $permohonan1 +1 }}.</td>  
                    <td>{{$permohonan->tarikh}}</td>
                <td>{{$permohonan->status_nama}}</td>
                <td>{{$permohonan->nama_staff}}</td>
                <td>{!! nl2br(e($permohonan->catatan)) !!}</td>           
                
                </tr> 
                @endforeach
        </tbody>
    </table>
    @endif
 </div> 
<br><br>
    </body>
</html>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>

</div></div></div></div>

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
    </div>
</div>
 
</body>
<!--   Core JS Files   -->

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('tim/assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('tim/assets/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('tim/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('tim/assets/js/light-bootstrap-dashboard.js?v=2.0.0 ')}}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('tim/assets/js/demo.js')}}"></script>

</html>
