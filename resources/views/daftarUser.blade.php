<?php $active ='home' ; ?>
@extends('layouts.admin')
@section('content')



<!--  -->
 
 <section class="sidebar">
    <section class="content-header">
      <h1>
         Data User
        <small>Tabel Data User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                </tr>
                </thead>
                <tbody>

                   @foreach($daftarUser as $value)
                <tr>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->nip_baru}}</td>
              
                  <td>
                       <div class="btn-group pull-right" role="group" aria-label="...">
                         <a href="" class="btn btn-block btn-primary"><i class="fa fa-edit"></i>Reset Password</a> 
                      </div>
                  </td>
                </tr>
                  @endforeach
               </tbody>
                
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
             
      <!-- /.row -->
    </section>
    <!-- /.
  <!-- /.content-wrapper -->




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

 @endsection