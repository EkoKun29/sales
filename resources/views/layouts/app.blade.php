<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../../assets/img/logo/AliansyahLogoo.png" rel="icon">
  <title>DATA SALES KOOR - {{ Auth::user()->name }}</title>
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    {{-- @include('layouts.sidebar') --}}
    <!-- Sidebar -->
    
    <div id="content-wrapper" class="d-flex flex-column">
        @include('layouts.navbar')
        @yield('content')
        
    </div>
    
  </div>
  @include('layouts.footer')
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../assets/js/ruang-admin.min.js"></script>
  <script src="../../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../../assets/js/demo/chart-area-demo.js"></script>  
  <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  @stack('js')
</body>

</html>