<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>

<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        @include('includes.header')
    </header>
    
    @if(session()->get('user')->level==1);
        @include('includes.sidebarKepala');
    @else
        @include('includes.sidebarPegawai');
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        @include('includes.footer')
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
