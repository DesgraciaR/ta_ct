<?php $active ='home'; ?>
@extends('layouts.page')
@section('content')


<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
 <section class="sidebar">
    <section class="content-header">
      <h1>
        Data Permohonan cuti
        <small>Tabel Data Cuti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Permohonan Cuti</a></li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header-pull-left"></div> 
                 <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/ajukancuti')}}" class="btn btn-block btn-primary"><i class="fa fa-user-plus"></i>Tambah</a>
                  </div>  
          <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Jenis Cuti</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Jumlah Hari</th>
                  <th>Keputusan Atasan Langsung</th>
                  <th>Keputusan KBTU</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pengajuan as $value)
                <tr>
                  <td>{{$value->JenisCuti->jenis_cuti}}</td>
                  <td>{{$value->tgl_mulai_ubah?:$value->tgl_mulai}}</td>
                  <td>{{$value->tgl_selesai_ubah?:$value->tgl_selesai}}</td>
                  <td>{{$value->jumlah_cuti}}</td>
                  <td>
                      @if($value->status=='Diterima')
                        <span class="label label-success pull-left">{{$value->status}}</span>
                      @else
                        <span class="label label-danger pull-left">{{$value->status}}</span>
                      @endif
                  </td>
                  <td>
                      @if($value->status_ppk=='Diterima')
                        <span class="label label-success pull-left">{{$value->status_ppk}}</span>
                      @else
                        <span class="label label-danger pull-left">{{$value->status_ppk}}</span>
                      @endif
                  </td>

                  <td>
                     @if($value->status_ppk =='Diterima' || $value->status_ppk=='Ditangguhkan') 
                    <div class="btn-group" role="group" aria-label="...">
                    <a href="{{url('/cetak/'.$value->id_permohonan_cuti)}}" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>Cetak</a>
                    </div>

                    <div class="btn-group" role="group" aria-label="...">
                    <a href="{{url('/cetak/'.$value->id_permohonan_cuti)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>Lihat</a>
                    </div>

                    <div class="btn-group" role="group" aria-label="...">
                    <a href="{{url('/delete/'.$value->id_permohonan_cuti)}}" class="btn btn-block btn-primary"><i class="fa fa-trash">Hapus</i></a>
                    </div>

                    @elseif($value->status =='Ditolak' || $value->status_ppk =='Ditolak')
                     <div class="btn-group" role="group" aria-label="...">
                    <a href="{{url('/delete/'.$value->id_permohonan_cuti)}}" class="btn btn-block btn-primary"><i class="fa fa-trash">Hapus</i></a>
                  </div>

                 @elseif($value->status == NULL || $value->status_ppk == NULL)
                   <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/delete/'.$value->id_permohonan_cuti)}}" class="btn btn-sm btn-success"><i class=" fa fa-close">Batalkan</i></a>
                </div>

            

                @endif
                
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
      </div>
      <!-- /.row -->
    </div>


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
  
 
 @endsection