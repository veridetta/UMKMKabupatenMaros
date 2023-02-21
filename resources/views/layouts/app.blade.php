<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>DINAS | UMKM KABUPATEN MAROS</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicons -->
    <link href="{{asset('img/favicon1.png')}}" rel="icon">
    <link href="{{asset('img/Officiallogo.png')}}" rel="Officiallogo">

        <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet"> -->

        <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    @yield('content')
    <!-- <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script> --> -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
    <!-- <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script> -->
    <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('js/main.js')}}"></script>
   @stack('js')
</body>
</html>
