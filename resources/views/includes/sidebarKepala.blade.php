
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
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
    
      <ul class="sidebar-menu" data-widget="tree">

    <li class="treeview">
          <a href="#">
            <span>TENTANG AKUN SAYA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Profil</a></li>
            <li><a href="{{url('/ubahpassword')}}"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
            <li><a href="{{ route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">{{csrf_field()}}</form><i class="fa fa-circle-o"></i>Keluar</a></li>
          </ul>
        </li>

     <li class="header"><b>MENU UTAMA</b></li>
        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

         <li>
          <a href="{{url('/pengajuan')}}">
            <i class="fa fa-files-o "></i> <span>Pengajuan Cuti</span>
          </a>
        </li>
          <li>
          <a href="{{url('/permohonancuti')}}">
            <i class="fa fa-edit "></i> <span>Data Permohonan Cuti</span>
             <span class="pull-right-container">
              <span class="label label-primary pull-right">{{\GlobalHelper::notifikasi()}}</span>
            </span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class="fa fa-history "></i> <span>Histori</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{count(\GlobalHelper::baca())}}</span>
            </span>

          </a>
        </li>
        
      </ul>
            </section>
    <!-- /.sidebar -->
  </aside>