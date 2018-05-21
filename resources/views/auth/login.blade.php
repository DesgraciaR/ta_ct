@extends('layouts.app')
@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $message) 
    <li>{{ $message }}</li>
  @endforeach
  </ul>
  </div>
@endif


<div class="container">
  <div class="row">
      <div class="col-md-8">
        <br><br>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <div class="image">
        <img src="{{ url('img/bkn2.png') }}">
      </div>
        <h1><strong><font color="#333333">Sistem Cuti </font></strong></h1>
      
    <div class="col-md-12"></div>
    <div class="login-box-body col-md-6 pull-right">
    <form action="{{ url('auth')}}" method="POST" >
      {{csrf_field()}}
       <div class="form-group has-feedback">
         <label>NIP</label><input  type="text" id="nip_baru" class="form-control" name="nip_baru" placeholder="NIP" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

       <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <!-- /.col -->
      </div>

      <button type="submit" class="btn btn-primary" style="width: 150px;">
        Login
      </button>
      <br>
      <a class="btn btn-link" href="#" data-toggle="modal" data-target="#modal-default">
        Forgot Your Password?
      </a>
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                  <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>Perhatian</h4>
                Jika Lupa Password Hubungi Admin bagian Tata Usaha
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
  </div>
</div>
@endsection
