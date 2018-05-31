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
                  <th>Jabatan</th>
                  <th>Unit Organisasi</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                   @foreach($daftarUser as $value)
                <tr>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->nip_baru}}
                  </td>
                  <td>{{$value->level}}</td>
                  <td> 4</td>
                  <td>
                       <div class="btn-group pull-right" role="group" aria-label="...">
                         <a data-target="#modal-default" data-toggle="modal" class="btn btn-block btn-primary"><i class="fa fa-edit"></i>Reset Password</a> 
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
             <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">    
            <div class="modal-body">
                
              
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                    <form method="post" action="">
                      {{csrf_field()}}
                      <div class="box-header with-border">
                        <h3 class="box-title">Reset Password</h3>
                      </div>
                      
                      <div class="box-body">
                        <div class="col-md-12">
                            
                         <div class="form-group">
                            <input type="password" name="new_password" placeholder="Masukan Password Baru" class="form-control">
                         </div>
                        <div class="form-group">
                             <input type="password" id="password-confirm" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" class="form-control">
                        </div>
                          </div>
                           
                        </div>
                      </div>

                      <div class="modal-footer">
                      
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> 
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>

                       
                      </form>
                    </div>
                   </div>
                 </div>
               </div>
            </div>
          </div>
        </div>




      </div>
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