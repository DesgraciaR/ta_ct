<?php $active ='home'; ?>

@extends('layouts.member')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      USERS
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-2">
        <button type="button" class="btn btn-block btn-primary"  data-toggle="modal" data-target="#add-user">
          Create new user</button>
      </div>
    </div>
    <div class="modal fade" id="add-user">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add User</h4>
          </div>
          <div class="modal-body">
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" placeholder="AyoSMS">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" placeholder="mail@mail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    aXc67Z (menyesuaikan backend mau password gmn(?))
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Provider</label>
                  <div class="col-sm-9">
                    <input type="radio" name="r1" class="minimal"> AyoSMS
                  </div>
                  <div class="col-sm-9">
                    <input type="radio" name="r2" class="minimal"> MobiWeb
                  </div>
                  </label>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Operator</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">
                      <option>XL</option>
                      <option>Indosat</option>
                      <option>Telkomsel</option>
                      <option>Halo</option>
                      <option>Axis</option>
                      <option>3</option>
                      <option>Smartfren</option>
                    </select>
                  </div>
                  </label>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-8">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create user</button>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-body">
            <table id="example1" class="table table-striped">
              <thead>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Provider</th>
                <th>Operator</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>rinisetiawati</td>
                <td>rinisetiawati381@gmail.com</td>
                <td>aXc67Z</td>
                <td>AyoSMS</td>
                <td>Indosat,XL</td>
                <td>
                  <button type="button" class="btn btn-sm">
                    <i class="fa fa-pencil"></i> Edit
                  </button>
                  <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#delete-group">
                    <i class="fa fa-trash"></i> Remove
                  </button>
          </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="delete-group">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete group</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              Deleting this group will revoke permissions to assigned users.
            </div>
          </div>
          <!-- /.box-body -->
          <div class="form-actions">
            <div class="row">
              <div class="col-md-10 pull-right">
                <button type="submit" class="btn btn-primary">Yes, Delete group</button>
                <button class="btn btn-default">No, Keep group</button>
              </div>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection