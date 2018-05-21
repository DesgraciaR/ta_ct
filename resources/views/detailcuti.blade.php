<?php $active ='home' ; ?>
@extends('layouts.page')
@section('content')

@php($data = \GlobalHelper::accessdata($detailpermohonan->nip_baru))
 
  <section class="content-header">
      <h1>
        Detail Permohonan cuti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Permohonan Cuti</a></li>
        <li class="active">Detail permohonan cuti
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box">
            <div class="box-header with-border"><label>DATA PEGAWAI</label></div>
                <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                <div class="box-body no-padding">
                    <img src="{{url('dist/img/user1-128x128.jpg') }}" class="pull-right-left" > </li>
                    <table class="table table-striped">  
                       <tr>
                          <td>Nama</td>
                          <td>{{$detailpermohonan->user->nama}}</td>
                        <tr>
                          <td>NIP</td>
                          <td>{{$detailpermohonan->nip_baru}}</td>
                        </tr>
                       </tr>
                        <tr>
                          <td>Jabatan</td>
                          <td>{{$data->jab_olah}}</td>
                        </tr>
                        <tr>
                          <td>Masa Kerja</td>
                          <td>{{$data->mk_tahun}}</td>
                        </tr>
                      </table>
                </div>

                 <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase"></a>
                </div>
        </div>
      </div>



        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border"><label>DATA CUTI</label>
            <div class="btn-group pull-right" role="group" aria-label="...">
               <a data-target="#modal-default" data-toggle="modal" class="btn btn-block btn-primary"><i class="fa fa-edit"></i>Edit</a> 
            </div>

            </div>
                <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">  
                    <tr>
                      <td>Jenis Cuti</td>
                      <td>{{$detailpermohonan->JenisCuti->jenis_cuti}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Mulai</td>
                      <td>{{$detailpermohonan->tgl_mulai}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Selesai</td>
                      <td>{{$detailpermohonan->tgl_selesai}}</td>
                    </tr>

                    <tr>
                      <td>Alamat</td>
                      <td>{{$detailpermohonan->alamat_cuti}}</td>
                    </tr>
                     <tr>
                      <td>Alasan</td>
                      <td>{{$detailpermohonan->alasan_cuti}}</td>
                    </tr>

                    <tr>
                      <td>Bukti Pendukung</td>
                      <td>{{$detailpermohonan->bukti_cuti}}</td>
                    </tr>
                  </table>

                  <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase"></a>
                  </div>

                
                 <div class="btn-group pull-left-right" role="group" aria-label="...">
                  <a href="{{url('ubahstatus/'.$detailpermohonan->id_permohonan_cuti.'/Diterima')}}" class="btn btn-block btn-primary">Terima</i></a>
                 </div>

                 <div class="btn-group pull-left-right" role="group" aria-label="...">
                  <a href="{{url('ubahstatus/'.$detailpermohonan->id_permohonan_cuti.'/Ditolak')}}" class="btn btn-block btn-primary">Tolak</i></a>
                </div>

                <div class="btn-group pull-left-right" role="group" aria-label="...">
                  <a href="{{url('ubahstatus/'.$detailpermohonan->id_permohonan_cuti.'/Ditangguhkan')}}" class="btn btn-block btn-primary">Tangguhkan</i></a>
                </div>

              </div>

             </div>

           </div>
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
                          <div class="box-body">
                          <div class="col-md-6">
              

                         <div class="form-group">
                            <label>Tanggal Mulai</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_mulai" value="{{$detailpermohonan->tgl_mulai}}">
                        </div>
                        <!-- /.input group -->
                      </div>


                      <div class="form-group">
                        <label>Tanggal Selesai</label>

                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker3" name="tgl_selesai" value="{{$detailpermohonan->tgl_selesai}}">
                        </div>
                        <!-- /.input group -->
                      </div>
                </div>
              </div>
              <div class="modal-footer">
              <div>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button> 
              </div>

                     <div>
                        <button type="submit" class="btn btn-default pull-right">
                         <a type="button" class="btn btn-primary" href ="{{url('/editdetail')}}">Simpan</a></button>
                     </div>
                   </div>
                </div>
              </div>
            </div>


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
          </div>



        </div>
    </div>
  </div>
</div>
</div>


@endsection