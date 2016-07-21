@extends('layouts.login')

@section('content')

<?php

  // for($r = 5; $r <= 10; $r++) {
  //
  //   for ($i = 1; $i <= 25; $i++) {
  //     DB::table('tb_id_exam')->insert([
  //       'level' => $r,
  //       'set'   => 1,
  //       'id_exam' => $i
  //     ]);
  //   }
  //
  //   for ($i = 1; $i <= 25; $i++) {
  //     DB::table('tb_id_exam')->insert([
  //       'level' => $r,
  //       'set'   => 2,
  //       'id_exam' => $i
  //     ]);
  //   }
  //
  //   for ($i = 1; $i <= 25; $i++) {
  //     DB::table('tb_id_exam')->insert([
  //       'level' => $r,
  //       'set'   => 3,
  //       'id_exam' => $i
  //     ]);
  //   }
  //
  //   for ($i = 1; $i <= 25; $i++) {
  //     DB::table('tb_id_exam')->insert([
  //       'level' => $r,
  //       'set'   => 4,
  //       'id_exam' => $i
  //     ]);
  //   }
  //
  // }

?>

<div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("สมัครสมาชิกสำเร็จ", "", "success")
        </script>
      @endif
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">ระบบล็อกอิน</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                  <span class="help-block">
                                    <strong>กรุณากรอกข้อมูล</strong>
                                  </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> เข้าสู่ระบบ
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
