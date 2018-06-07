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
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                  <th>Tanggal Pengajuan</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Jenis Cuti</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($historicuti as $value)
                <tr>
                  <td>{{$value->tgl_pengajuan}}</td>
                  <td>{{$value->tgl_mulai}}</td>
                  <td>{{$value->tgl_selesai}}</td>
                  <td>{{$value->JenisCuti->jenis_cuti}}</td>
                  <td>{{$value->status}}</td>
                  <td>
                  <div class="btn-group" role="group" aria-label="...">
                  <a data-target="#modal-default" data-toggle="modal" class="btn btn-block btn-primary">Lihat</i></a>
                <!--   <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a> -->
                 </div>
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/hapus/'.$value->id_permohonan_cuti)}}" class="btn btn-block btn-danger">Hapus</i></a>
                <!--   <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a> -->
                 </div>

                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <!--  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Formulir Permohonan Cuti</h4>
                    </div> -->
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="box">
                          <div class="box-header with-border">
                            <h3 class="box-title">Formulir Permohonan Cuti</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <table class="example1" width="100%">
                              <tr>
                                <th colspan="5">I.DATA PEGAWAI</th>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td colspan="2"></td>
                                <td>NIP</td>
                                <td>xxxxxxxx</td>
                              </tr>
                              <tr>
                                <td>Jabatan</td>
                                <td colspan="2"></td>
                                <td>Masa Kerja</td>
                                <td>XXXXXXX</td>
                              </tr>
                              <tr>
                                <td>Unit Kerja</td>
                                <td colspan="4"></td>
                                
                              </tr>
                              <tr>
                                <th colspan="5">II.DATA CUTI</th>
                              </tr>
                              <tr>
                                <td>1.Cuti Tahunan</td>
                                <td><input type="checkbox" class="minimal" ></td>
                                <td>2.Cuti Besar</td>
                                <td colspan="2"><input type="checkbox" class="minimal" ></td>
                              </tr>
                              <tr>
                                <td>3.Cuti Sakit</td>
                                <td><input type="checkbox" class="minimal" ></td>
                                <td>4.Cuti Melahirkan</td>
                                <td colspan="2"><input type="checkbox" class="minimal" ></td>
                              </tr>
                              <tr>
                                <td>5.Cuti Karena Alasan Penting</td>
                                <td><input type="checkbox" class="minimal" ></td>
                                <td>6.Cuti di Luar Tanggungan Negara</td>
                                <td colspan="2"><input type="checkbox" class="minimal" ></td>
                              </tr>
                               <tr>
                                <th colspan="5">III.ALASAN CUTI</th>
                              </tr>
                              <tr>
                                <td colspan="5">Ingin Libur</td>
                              </tr>
                              <tr>
                                <th colspan="5">IV.LAMANYA CUTI</th>
                              </tr>
                              <tr>
                                <td>Selama</td>
                                <td>(hari/bulan/tahun)*</td>
                                <td>Mulai tanggal</td>
                                <td>s/d</td>
                                <td></td>
                              </tr>
                               <tr>
                                <td>x</td>
                                <td>x</td>
                                <td>x</td>
                                <td>x</td>
                                <td></td>
                              </tr>
                               <tr>
                                <th colspan="5">V.CATATAN CUTI</th>
                              </tr>
                              <tr>
                                <td colspan="3">1.CUTI TAHUNAN</td>
                                <td>2.CUTI BESAR</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Tahun</td>
                                <td>Sisa</td>
                                <td>Keterangan</td>
                                <td>3.CUTI SAKIT</td>
                                <td></td>
                              </tr>
                                <tr>
                                <td>N-2</td>
                                <td></td>
                                <td></td>
                                <td>4.CUTI MELAHIRKAN</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>N-1</td>
                                <td></td>
                                <td></td>
                                <td>5.CUTI KARENA ALASAN PENTING</td>
                                <td></td>
                              </tr>
                               <tr>
                                <td>N</td>
                                <td></td>
                                <td></td>
                                <td>6.CUTI DI LUAR TANGGUNGAN NEGARA</td>
                                <td></td>
                              </tr>
                               <tr>
                                <th colspan="5">VI.ALAMAT SELAMA MENJALANKAN CUTI</th>
                              </tr>
                              <tr>
                                <td colspan="3"><textarea class="form-control" rows="2"></textarea></td>
                                <td>Telepon</td>
                                <td></td>
                              </tr>
                             <tr>
                                <td></td>
                                <td></td>
                             </tr>
                             <tr>
                                <th colspan="5">VII.PERTIMBANGAN ATASAN LANGSUNG</th>
                              </tr>
                              <tr>
                                <td>DISETUJUI</td>
                                <td>PERUBAHAN</td>
                                <td>DITANGGUHKAN</td>
                                <td>TIDAK DISETUJUI</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>XX</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="3"><textarea class="form-control" rows="2"></textarea></td>
                                <td colspan="2"><textarea class="form-control" rows="2"></textarea></td>
                              </tr>
                               <tr>
                                <th colspan="5">VIII.KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</th>
                              </tr>
                              <tr>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>

                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
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