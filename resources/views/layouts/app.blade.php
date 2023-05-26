 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>
     <!-- highlight.js -->


     <!-- <link rel="stylesheet" href="{{ asset('assets/highlight.js/styles/default.min.css') }}"> -->

     <!-- <link rel="stylesheet" href="/assets/highlight.js/styles/default.min.css"> -->

     <!-- <link rel="stylesheet" href="/path/to/styles/default.min.css"> -->
     <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css"> -->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
     <!-- and it's easy to individually load additional languages -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/languages/go.min.js"></script>


     <!-- datatables -->


     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
     <!-- <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}"> -->
     <!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> -->


     <!-- <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}"> -->
     <!-- <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script> -->

     <!--      

     <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
     <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script> -->




     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- Scripts -->
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])


     <!-- Ekko Lightbox -->
     <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css') }}">

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Tempusdominus Bootstrap 4 -->
     <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
     <!-- iCheck -->
     <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
     <!-- JQVMap -->
     <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
     <!-- summernote -->
     <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">


     <!-- CodeMirror -->
     <link rel="stylesheet" href="{{ asset('codemirror/lib/codemirror.css') }}">
     <link href="{{ asset('codemirror/theme/3024-night.css') }}" rel="stylesheet" />
     <script src="{{ asset('codemirror/lib/codemirror.js') }}"></script>
     <script src="{{ asset('codemirror/mode/xml/xml.js') }}"></script>



 </head>

 <body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper">
         <div class="preloader flex-column justify-content-center align-items-center">
             <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
         </div>

         @include('layouts.partials.topnavbar')
         @guest
         @else
         @include('layouts.partials.sidebar')
         @endguest
         @yield('content')
         @include('layouts.partials.footer')

     </div>
     <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js') }}"></script>

     <!-- jQuery -->
     <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
         $.widget.bridge('uibutton', $.ui.button)
     </script>
     <!-- Bootstrap 4 -->
     <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <!-- ChartJS -->
     <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
     <!-- Sparkline -->
     <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
     <!-- JQVMap -->
     <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
     <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
     <!-- jQuery Knob Chart -->
     <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
     <!-- daterangepicker -->
     <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
     <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
     <!-- Tempusdominus Bootstrap 4 -->
     <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
     <!-- Summernote -->
     <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
     <!-- overlayScrollbars -->
     <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
     <!-- AdminLTE App -->
     <script src="{{ asset('dist/js/adminlte.js') }}"></script>

     <!-- AdminLTE for demo purposes -->
     <!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>


     <script src="{{ asset('dist/js/repeater.js') }}"></script>

     <!-- AdminLTE for demo purposes -->
     <!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <!-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> -->
     <!-- highlight.js -->
     <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
     <!-- <script src="/path/to/highlight.min.js"></script> -->
     <script>
         hljs.highlightAll();
     </script>

 </html>