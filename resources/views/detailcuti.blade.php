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
                    <img style="align-content: center;" src="{{url('dist/img/user1-128x128.jpg') }}" class="pull-right-left"> 
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
                        <tr>
                          <td>Unit Organisasi</td>
                          <td>{{$data->namaunor}}</td>
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
                      <td>{{$detailpermohonan->tgl_mulai_ubah?:$detailpermohonan->tgl_mulai}}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Selesai</td>
                      <td>{{$detailpermohonan->tgl_selesai_ubah?:$detailpermohonan->tgl_selesai}}</td>
                    </tr>
                    <tr>
                      <td>Jumlah Cuti</td>
                      <td>{{$detailpermohonan->jumlah_cuti}}</td>
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

                     @if(session()->get('user')->ppk == '1')
                    <tr>
                      <td>Ket_acc_Atasan</td>
                      <td>{{$detailpermohonan->alasan_acc_atasan}}</td>
                    </tr>
                    @endif

              
                  </table>
                </div>


                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase"></a>
                </div>

            
               <form method="post" action="{{url('updatetindakan',$detailpermohonan->id_permohonan_cuti)}}">
                      {{csrf_field()}}
              <div class="form-group">
                 <label>Tindakan</label>
                <select class="form-control select2" style="width: 100%;" name="tindakan" required="Terima">
                    <option value="Diterima">Terima</option>
                    <option value="Ditolak">Tolak</option>
                    <option value="Ditangguhkan">Tangguhkan</option>
              
                </select>
              </div>

              <div class="form-group">
                  <label>Tuliskan Pesan</label>
                  <textarea class="form-control" rows="3" name="pesan" placeholder="Enter ..." name="alasan"></textarea>
              </div>


              <div class="form-group">
                <button type="#" class="btn btn-primary" name="kirim">Kirim</button>
                <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/permohonan')}}" class="btn btn-primary">Kembali</i></a></div>
                <!--   <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a> -->
              </div>
            </form>



            </div>
        </div>
      </div>


      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">    
            <div class="modal-body">
                
              
              <div class="row">
                <div class="col-md-12">
                  <div class="box">
                    <form method="post" action="{{url('editdetail',$detailpermohonan->id_permohonan_cuti)}}">
                      {{csrf_field()}}
                      <div class="box-header with-border">
                        <h3 class="box-title">Ubah Tanggal Permohonan Cuti</h3>
                      </div>
                      
                      <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Tanggal Mulai</label>
                              
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control pull-right" id="datepicker1" name="tgl_mulai" value="{{$detailpermohonan->tgl_mulai_ubah?:$detailpermohonan->tgl_mulai}}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Tanggal Selesai</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_selesai" value="{{$detailpermohonan->tgl_selesai_ubah?:$detailpermohonan->tgl_selesai}}">
                              </div>
                              <!-- /.input group -->
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
    </section>


<script>
  $(function () {
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
      
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      date: new Date("{{ $detailpermohonan->tgl_selesai }}")
    });
    $('#datepicker3').datepicker({
      autoclose: true
    });
 
  })

</script>
          </div>



@endsection