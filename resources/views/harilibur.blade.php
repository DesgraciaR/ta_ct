<?php $active ='home' ; ?>
@extends('layouts.admin')
@section('content')
 <section class="sidebar">
    <section class="content-header">
      <h1>
        Data Libur Nasional
        <small>Tabel Hari Libur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Hari Libur</a></li>
      </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header-pull-left">
                <div class="btn-group" role="group" aria-label="...">
                <a href="" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa  fa-plus-square"></i>Tambah Data Libur</a> 
              </div> 

              <div class="btn-group" role="group" aria-label="...">
                <a href="" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Hapus semua Data Libur</a> 
              </div> 
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Keterangan Libur</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($daftarLibur as $value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->tanggal}}</td>
                  <td>{{$value->ket_libur}}</td>  
                  <td>
                     <div class="btn-group" role="group" aria-label="...">
                      <a class="btn btn-sm btn-primary" data-target="#modal-<?php echo $value->id?>" data-toggle="modal" ><i class="fa  fa-plus-square"></i>Edit Data Libur</a> 
                    </div>
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="{{url ('/hapuslibur/'.$value->id)}}" class="btn btn-sm btn-danger"><i class=" fa fa-trash">Hapus</i></a>
                    </div>
                  </td>
                </tr>


                 <div class="modal fade" id="modal-<?php echo $value->id?>">
                  <div class="modal-dialog">
                    <div class="modal-content">    
                      <div class="modal-body">
                          
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="box">
                              <form method="post" action="{{url('updatelibur',$value->id)}}">
                                {{csrf_field()}}
                                <div class="box-header with-border">
                                  <h3 class="box-title">Edit Data Cuti</h3>
                                </div>
                                     <div class="form-group">
                                        <label>Tanggal </label>
                                         <div class="form-group">
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_libur" value="{{$value->tanggal}}">
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                    </div>

                                  <div class="form-group">
                                    <label>Jumlah tahun lalu</label>
                                    <input type="text" class="form-control pull-right" id="text8" name="keterangan" value="{{$value->ket_libur}}">
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

































                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">    
            <div class="modal-body">
                
              
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                    <form method="post" action="{{ action('ManajemenUserController@store')}}">
                      {{csrf_field()}}
                      <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Libur Nasional</h3>
                      </div>
                           <div class="form-group">
                              <label>Tanggal </label>
                               <div class="form-group">
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker1" name="tgl_libur">
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>

                          <div class="form-group">
                              <label>Keterangan </label>
                              <textarea class="form-control" rows="1" placeholder="Enter ..." name="keterangan"></textarea>
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
      <!-- /.row -->


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
    })
  })
</script>
<script>
    $(function () {
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    });
    $('#datepicker2').datepicker({
      autoclose: true
    });
    $('#datepicker3').datepicker({
      autoclose: true
    });
 
  })


</script>

    
 

  
 
 @endsection