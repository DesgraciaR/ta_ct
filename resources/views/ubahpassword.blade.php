<?php $active ='home'; ?>
@extends('layouts.page')
@section('content')


 <section class="content-header">
      <h1>
        Ubah Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ubah Password</a></li>
        <li class="active">Ubah Password
        </li>
      </ol>
    </section>

  <section class="content">
    @if (Session::has('sukses'))
    <p>Sukses Ganti</p>
    @endif

    @if (Session::has('gagal'))
    <p>Gagal ganti</p>
    @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                  <!--   <div class="col-md-12"> -->
                        <div class="panel panel-default">
                            <div class="text-center">
                            <p>Ganti passwordmu disini</p>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="{{url('/ubahpassword/save')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="current_password">Password</label>
                                            <input type="password" name="old_password" placeholder="Masukan Password Lama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="new_password" placeholder="Masukan Password Baru" class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <input type="password" id="password-confirm" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Ganti Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>

@endsection