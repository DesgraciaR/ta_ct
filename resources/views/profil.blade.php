<?php $active ='home' ; ?>
@extends('layouts.page')
@section('content')

@php($data = \GlobalHelper::accessdata($prof->nip_baru))

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
                <table class="table table-striped">
                  <tr>
                 <!--  <td>
                    <img style="align-items: center;" src="{{url('dist/img/user.jpg') }}" > 
                  </td> -->
                  <td>Nama</td>
                  <td>{{$data->nama}}</td>
                </tr>
                <tr>
                  <td>NIP</td>
                  <td>{{$data->nip_baru}}</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td>{{$data->jab_olah}}</td>
                </tr>
                 <tr>
                  <td>Masa Kerja</td>
                  <td>{{$data->mk_tahun}}Tahun {{$data->mk_bulan}}bulan </td>
                </tr>
                <tr>
                  <td>Unit Organisasi</td>
                  <td>{{$data->namaunor}}</td>
                </tr> 
                <tr>
                  <td>Nama Atasan Langsung</td>
                  <td>{{$data->nama_atasan}}</td>
                </tr> 
                <tr>
                  <td>Nama Atasan Atasan</td>
                  <td>{{$data->nama_atasan_atasan}}</td>
                </tr>


                  
                 
                  </table>
                </div>

          </div>
        </div>


                
      </div>
      
    </section>

@endsection