<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Semakan Fail</title>

  <!-- Bootstrap Core CSS -->
  <link  rel="stylesheet" href="{{asset('stylish/vendor/bootstrap/css/bootstrap.min.css')}}" >

  <!-- Custom Fonts -->
  <link href="{{asset('stylish/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{asset('stylish/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('stylish/css/stylish-portfolio.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Semak Fail</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Home</a>
      </li>
      
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Semakan Fail</h1>
      <h5 class="mb-5">
        <em>Sila masukkan no.fail anda</em>
      </h5>
     <!-- Search form -->
     <form action="{{URL::to('/search')}}" method="POST" role="search">
    {{ csrf_field() }}
<div class="active-cyan-3 active-cyan-4 mb-4">
  <input class="form-control" type="text" name="q" placeholder="masukkan no. fail" aria-label="Search">
</div>
      <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Semak</button>
      
      </form><br>
      @if(isset($details))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Bil</th>
                <th>No. Fail</th>
                <th>Tarikh</th>
                <th>Status</th>
                <th>Catatan</th>
                

            </tr>
        </thead>
        <tbody>
        @foreach($details as $user=> $user1)
              <tr>
                
                    <td>{{ $user +1 }}.</td>    
                    <td>{{$user1->no_fail}}</td>             
                    <td>{{$user1->tarikh}}</td>
                <td>{{$user1->status_nama}}</td>
                <td>{{$user1->catatan}}</td>             
                
                </tr> 
            @endforeach
        </tbody>
    </table>
            
        @endif
    </div>
  
    
    
   
  </header>

  

 <br><br>
  <!-- Contact Section -->
  <section id="contact" class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Alamat</h4>
              <hr class="my-4">
              <div class="small text-black-50">Pejabat Daerah/Tanah Klang,</div>
              <div class="small text-black-50">Jalan Kota, Kawasan 1, 41902 Klang, Selangor.</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">klang@selangor.gov.my </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">03-3371 1963  </div>
              <div class="small text-black-50">EXT:  ( )</div>
              <div class="small text-black-50">EXT:  ( )</div>
            </div>
          </div>
        </div>
      </div>



 

  

 

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('stylish/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('stylish/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('stylish/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('stylish/js/stylish-portfolio.min.js')}}"></script>

</body>

</html>
