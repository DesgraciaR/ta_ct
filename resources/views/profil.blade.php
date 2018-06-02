<?php $active ='home' ; ?>
@extends('layouts.page')
@section('content')

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

        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border"><label>DATA PEGAWAI</label></div>
                <div class="box-tools pull-right">   
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <div >
                    <img style="align-items: center;" src="{{url('dist/img/user.jpg') }}" > 
                    <span>Nama</span>
                    <span>:</span>
                    <span>Anti</span>

                </div>
          </div>


                
      </div>
      
    </section>

@endsection