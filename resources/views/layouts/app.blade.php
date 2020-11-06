
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('FT-Tracking', 'FT-Tracking') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"  style="position: fixed;width: 100%;z-index: 9999;">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
            <div class="container">
            <img alt="Selangor logo" src="img/jataselangor.png" style="height: 65px; width: 50px;" title="Selangor">
                <a style="color:white"class="navbar-brand" href="{{ url('/') }}">
                    {{ config('FT-Tracking', 'FT-Tracking') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item" style="padding-left:30px;padding-right:30px;">
                            <a style="color:white"class="nav-link" href="#page-top">Semak Fail</a>
                                
                            </li>
                            <li class="nav-item" style="padding-left:30px;padding-right:30px;">
                           <a style="color:white"class="nav-link" href="img/SENARAI SEMAK FT.pdf" target="blank">Senarai Semak</a>
                             </li> 
                             <li class="nav-item" style="padding-left:30px;padding-right:30px;">
                           <a style="color:white"class="nav-link" href="img/SURAT PERMOHONAN FT.pdf" target="blank">Surat Permohonan</a>
                             </li>    
                        
                             <li class="nav-item" style="padding-left:30px;padding-right:30px;">
                                <a style="color:white" class="nav-link" href="#contact">Hubungi</a>
                                </li>
                           
                   
                    

                               
                                    
                                </div>
                            </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
       

 @yield('content')
        <main class="py-4">
           
        </main>
    </div>
</body>
</html>
