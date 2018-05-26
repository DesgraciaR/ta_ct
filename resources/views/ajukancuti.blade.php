<?php $active ='home' ; ?>
@extends('layouts.page')
@section('content')
  <section class="content-header">
      <h1>
        Ajukan Cuti
        <small>Form pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ajukan Cuti</a></li>
        <li class="active">Form pengajuan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- /.box -->
    <!-- <form action="{{URL::to('ajukancuti')}}" method="POST"> -->
      {{ Form::open(array('url'=>'ajukancuti','files'=>true)) }}
      <div class="row">
        <!-- /.col (left) -->

        
            <div class="col-lg-2 col-xs-1">
                  <div class="small small-box bg-yellow">
                    <p>12</p>
                    <p>Jatah Cuti</p>
                  </div>
              </div>


              <div class="col-lg-2 col-xs-1">
          <!-- small box -->
                  <div class="small-box bg-orange">
                    <p>12</p>
                    <p>Cuti Diambil<p>
                </div>
              </div>


              <div class="col-lg-2 col-xs-1">
          <!-- small box -->
                  <div class="small-box bg-red">
                    <p>12</p>
                    <p>Sisa Cuti</p>
                </div>
              </div>

        <div class="col-md-12">
          <div class="box">
            <div class="box-body">














            <div class="form-group">
              <label>Jenis cuti</label>
                <select class="form-control select2" style="width: 100%;" name="id_jenis_cuti">
                  @foreach($jenis_cuti as $data)
                  <option value="{{$data->id_jenis_cuti}}">{{$data->jenis_cuti}}</option>
                  @endforeach
                </select>
              </div>
              <!-- Date -->
              <div class="form-group">
                <label>Tanggal Pengajuan</label>
                 <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker1" name="tgl_pengajuan">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Tanggal Mulai</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_mulai">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
               <div class="form-group">
                <label>Tanggal Selesai</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker3" name="tgl_selesai">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

               <div class="form-group">
                  <label>Alamat cuti</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
                </div>
              <!-- /.form group -->

                <div class="form-group">
                  <label>Alasan cuti</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="alasan"></textarea>
                </div>
              <!-- /.form group -->
               <div class="form-group">
                  <label>No.Telepon</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="noTelepon">
                </div> 
              <div class="form-group">
                  <label for="exampleInputFile">Foto bukti</label>
                  <input type="file" id="exampleInputFile" name="foto_bukti">
                  <p class="help-block"></p>
                </div>  
              <div class="form-group">
                 <label>Ajukan Kepada</label>
                <select class="form-control select2" style="width: 100%;" name="tujuan" required="">
                  @if(session()->get("data")->jenis_jabatan==1)
                    <option value="{{session()->get("data")->nip_atasan_atasan}}">{{session()->get("data")->nama_atasan_atasan}}</option>
                  @else
                    <option value="{{session()->get("data")->nip_atasan}}">{{session()->get("data")->nama_atasan}}</option>
                    <option value="{{session()->get("data")->nip_atasan_atasan}}">{{session()->get("data")->nama_atasan_atasan}}</option>
                  @endif
                  
              
                </select>
              </div>

              <div>
                <button type="#" class="btn btn-primary" name="kirim">Submit</button>
                <div class="btn-group" role="group" aria-label="...">
                  <a href="{{url('/pengajuan')}}" class="btn btn-primary">Batal</i></a>
                <!--   <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a> -->
                 </div>



            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
    <!-- </form> -->
    {{ Form::close() }}
    </section>
    <!-- /.content -->
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