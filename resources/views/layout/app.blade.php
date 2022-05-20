
<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('includes/style')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('includes/navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('includes/sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('includes/footer')
        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('includes/script')

</body>
</html>