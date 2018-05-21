<?php $active ='home' ; ?>
@extends('layouts.page')
@section('content')
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
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Jenis Cuti</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($permohonancuti as $value)
                <tr>

                  <td>{{$value->user->nama}}</td>
                  <td>{{$value->nip_baru}}</td>
                  <td>{{$value->JenisCuti->jenis_cuti}}</td>
                  <td>{{$value->tgl_pengajuan}}</td>
                  <td>{{$value->tgl_mulai}}</td>
                  <td>{{$value->tgl_selesai}}</td>
                  <td>{{$value->alamat_cuti}}</td>
                  
                  <td>
                  
                    
                  <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/detailcuti/'.$value->id_permohonan_cuti)}}" class="btn btn-block btn-primary">Detail</i></a>
                <!--   <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a> -->
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

  
 
 @endsection