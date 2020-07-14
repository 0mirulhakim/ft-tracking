
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Teknikal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
   
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
                     <span class="brand-text font-weight-bold">PDT Klang</span>
                </div>
               
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Permohonan </p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" >
                            <i class="nc-icon nc-icon nc-bell-55"></i>
                            <p>Status </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('baru.index')}}">
                            <i class="nc-icon nc-circle"></i>
                            <p>Baru</p>
                        </a>
                    </li>
                    
              
              <li>
                <a href="{{route('jupem.index')}}" class="nav-link">
                  <i class="nc-icon nc-circle"></i>
                  <p>JUPEM</p>
                </a>
              </li>
              <li>
                <a href="{{route('kppt.index')}}" class="nav-link">
                  <i class="nc-icon nc-circle"></i>
                  <p>KPPT</p>
                </a>
              </li>
              <li>
                <a href="{{route('majlis.index')}}" class="nav-link">
                  <i class="nc-icon nc-circle"></i>
                  <p>Kerajaan Negeri</p>
                </a>
              </li>
              <li class="nav-item active">
                        <a class="nav-link" href="{{ url('customsearch') }}">
                            <i class="nc-icon nc-icon nc-notes"></i>
                            <p>Laporan </p>
                        </a>
                    </li>
          
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                   
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            
                        
                            <li class="nav-item">
                                
                                <a style="float:right;" class="nav-link" href="{{ route('logout') }}"
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
  <div class="container">    
     <br />
     <h3 align="center">Laporan</h3>
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
                            <th>Nama</th>
                            <th>No Rujukan</th>
                            <th>Status</th>
                            <th>No.Lot</th>
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
                    data:'nama',
                    name:'nama'
                },
                {
                    data:'no_rujukan',
                    name:'no_rujukan'
                },
                {
                    data:'status_nama',
                    name:'status_nama'
                },
                {
                    data:'no_lot',
                    name:'no_lot'
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
   <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('tim/assets/img/sidebar-1.jpg')}}" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('tim/assets/img/sidebar-3.jpg')}}" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('tim/assets/img/sidebar-4.jpg')}}" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('tim/assets/img/sidebar-5.jpg')}}" alt="" />
                </a>
            </li>

            

           


            

            
        </ul>
    </div>
</div>
 
</body>
<!--   Core JS Files   -->


</html>