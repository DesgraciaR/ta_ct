
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/admindashboard')}}">
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
          </a>
        </li>
          <li>
          <a href="{{url('daftarUser')}}">
            <i class="fa fa-table "></i> <span>Table Pegawai</span>
          </a>
        </li>
         <li>
          <a href="{{url('/jatahcuti')}}">
            <i class="fa fa-hourglass-half"></i> <span>Table Jatah Cuti</span>
          </a>
        </li>
        <li>
          <a href="{{url ('/daftarLibur')}}">
            <i class="fa fa-calendar-o "></i> <span>Data Libur Nasional</span>
          </a>
        </li>
             
            </section>
    <!-- /.sidebar -->
  </aside>

<!-- =============================================== -->