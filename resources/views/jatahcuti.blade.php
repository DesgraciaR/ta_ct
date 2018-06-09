<?php $active ='home' ; ?>
@extends('layouts.admin')
@section('content')



<!--  -->

 
 <section class="sidebar">
    <section class="content-header">
      <h1>
         Data Libur
        <small>Tabel Data Libur</small>
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
            <div class="box-header-pull-left">
              <div class="btn-group" role="group" aria-label="...">
                <a href="" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa  fa-plus-square"></i>Tambah Jatah Cuti</a> 
              </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Tahun</th>
                  <th>Jumlah tahun lalu</th>
                  <th>Jumlah tahun ini</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

               @foreach($jatah as $value)
                <tr>
                  <td>{{$value->user->nama}}</td>
                  <td>{{$value->nip_baru}}</td>
                  <td>{{$value->tahun}}</td>
                  <td>{{$value->jumlah_tahun_lalu}}</td>
                  <td>{{$value->jumlah_tahun_ini}}</td>
                 
              
                  <td>
                   <div class="btn-group" role="group" aria-label="...">
                       <a class="btn btn-sm btn-primary" data-target="#modal-<?php echo $value->id_jatah?>" data-toggle="modal" ><i class="fa fa fa-edit"></i>Edit</a> 
                    </div>

                   <div class="btn-group" role="group" aria-label="...">
                        <a href="{{'/hapusjatah/'.$value->id_jatah}}" class="btn btn-sm btn-danger"><i class=" fa fa-trash">Hapus</i></a>
                   </div>
                  </td>
                </tr>
                                <!-- Edit data Cuti -->
       <div class="modal fade" id="modal-<?php echo $value->id_jatah?>">
        <div class="modal-dialog">
          <div class="modal-content">    
            <div class="modal-body">
                
              
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                    <form method="post" action="{{url('editjatah',$value->id_jatah)}}">
                       {{csrf_field()}}
                      <div class="box-header with-border">
                        <h3 class="box-title">Edit Jatah cuti</h3>
                      </div>
                        <div class="form-group">
                            <label>NIP baru</label>
                              <input type="text" class="form-control pull-right" id="text5" name="nip_baru" value="{{$value->nip_baru}}">
                          </div>


                         <div class="form-group">
                            <label>Tahun</label>
                              <input type="text" class="form-control pull-right" id="text6" name="tahun" value="{{$value->tahun}}">
                          </div>
                              <!-- /.input group -->

                          <div class="form-group">
                            <label>Jumlah tahun lalu</label>
                            <input type="text" class="form-control pull-right" id="text8" name="jumlah_tahun_ini" value="{{$value->jumlah_tahun_lalu}}">
                          </div>
                              <!-- /.input group -->
                          <div class="form-group">
                            <label>Jumlah tahun ini</label>
                              <input type="text" class="form-control pull-right" id="text8" name="jumlah_tahun_ini" value="{{$value->jumlah_tahun_ini}}">
                          </div>
                          <br>


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
                    <form method="post" action="{{ action('JatahcutiController@store')}}">
                       {{csrf_field()}}
                      <div class="box-header with-border">
                        <h3 class="box-title">Tambah Jatah cuti</h3>
                      </div>
                        <div class="form-group">
                            <label>NIP baru</label>
                              <input type="text" class="form-control pull-right" id="text1" name="nip_baru">
                          </div>


                         <div class="form-group">
                            <label>Tahun</label>
                              <input type="text" class="form-control pull-right" id="text2" name="tahun">
                          </div>
                              <!-- /.input group -->

                          <div class="form-group">
                            <label>Jumlah tahun lalu</label>
                              <input type="text" class="form-control pull-right" id="text3" name="jumlah_tahun_lalu">
                          </div>
                              <!-- /.input group -->
                          <div class="form-group">
                            <label>Jumlah tahun ini</label>
                              <input type="text" class="form-control pull-right" id="text4" name="jumlah_tahun_ini">
                          </div>
                          <br>


                      <div class="modal-footer">
                      
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> 
                          <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                      </form>
                    </div>
                   </div>
                 </div>



      <!-- /.row -->
             
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