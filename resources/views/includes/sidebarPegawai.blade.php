
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
          <p><small>{{session()->get('user')->nama}}</small></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-dashboard fa-2x"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{url('/pengajuan')}}">
            <i class="fa fa-files-o fa-2x "></i> <span>Pengajuan Cuti</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-history fa-2x"></i> <span>Histori</span>
             <span class="pull-right-container">
              <span class="label label-primary pull-right">{{count(\GlobalHelper::baca())}}</span>
            </span>
          </a>
        </li>
            </section>
    <!-- /.sidebar -->
  </aside>

<!-- =============================================== -->