@extends('layouts/user')

@section('content')
<?php $information = DB::table('tb_user')->where('username', Auth::User()->username)->first(); ?>
<div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("บันทึกข้อมูลสำเร็จ", "", "success")
        </script>
      @endif
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">แก้ไขข้อมูลส่วนตัว</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_info_personal') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('prefix') ? ' has-error' : '' }}">
                            <label for="prefix" class="col-md-4 control-label">คำนำหน้าชื่อ</label>

                            <div class="col-md-6">
                                <select class="form-control" name="prefix">
                                    <option>นาย</option>
                                    <option>นาง</option>
                                    <option>นางสาว</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                          <label for="firstname" class="col-md-4 control-label">ชื่อจริง</label>
                          <div class="col-md-6">
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $information->firstname }}">
                            @if ($errors->first('firstname') == 'The firstname has already been taken.')
                              <span class="help-block">
                                <strong>ชื่อนี้มีผู้ใช้แล้ว</strong>
                              </span>
                              @else
                                @if ($errors->has('firstname'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                          <label for="lastname" class="col-md-4 control-label">นามสกุล</label>
                          <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $information->lastname }}">
                            @if ($errors->has('lastname'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                          <label for="address" class="col-md-4 control-label">ที่อยู่</label>
                          <div class="col-md-6">
                            <textarea id="address" class="form-control" name="address" rows="5" style="resize:none">{{ $information->address }}</textarea>
                            @if ($errors->has('address'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                          <label for="tel" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
                          <div class="col-md-6">
                            <input id="tel" type="text" class="form-control" name="tel" value="{{ $information->tel }}">

                            @if ($errors->first('tel') == 'The tel has already been taken.')
                              <span class="help-block">
                                <strong>เบอร์โทรศัพท์นี้มีผู้ใช้แล้ว</strong>
                              </span>
                              @else
                                @if ($errors->has('tel'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            @endif

                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">อีเมล</label>
                          <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $information->email }}" placeholder="example@gmail.com">
                            @if ($errors->first('email') == 'The email has already been taken.')
                              <span class="help-block">
                                <strong>อีเมลนี้มีผู้ใช้แล้ว</strong>
                              </span>
                              @else
                                @if ($errors->has('email'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                          <label for="username" class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>
                          <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username" value="{{ $information->username }}" readonly>
                            @if ($errors->first('username') == 'The username has already been taken.')
                              <span class="help-block">
                                <strong>ชื่อผู้ใช้งานนี้มีผู้ใช้แล้ว</strong>
                              </span>
                              @else
                                @if ($errors->has('username'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>
                          <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="{{ $information->password }}" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                            @if ($errors->has('password'))
                              <span class="help-block">
                                <strong>กรุณาตรวจสอบรหัสผ่านอีกครั้ง</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label for="password_confirmation" class="col-md-4 control-label">ยืนยันรหัสผ่าน</label>
                          <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ $information->password }}" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                            @if ($errors->has('password_confirmation'))
                              <span class="help-block">
                                <strong>กรุณาตรวจสอบรหัสผ่านอีกครั้ง</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                              <button type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-save"></i> บันทึกข้อมูล
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
