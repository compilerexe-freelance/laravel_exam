@extends('layouts/admin')

@section('content')
<?php $users = DB::table('tb_user')->get(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-heading">
          ผู้ใช้งานทั้งหมด
        </div>
        <div class="panel-body">

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tr>
                <th>ลำดับที่</th>
                <th>ชื่อ - นามสกุล</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ระดับเลเวล</th>
                <th></th>
              </tr>
              @foreach ($users as $user)

              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->prefix }} {{ $user->firstname}} {{ $user->lastname }}</td>
                <td>{{ $user->username }}</td>
                <td>
                  @if ($user->username == 'admin')
                    <?php echo "admin"; ?>
                  @else
                    <?php
                      $level_member = DB::table('tb_statistic')->where('username', $user->username)->first();
                      echo $level_member->level;
                    ?>
                  @endif
                </td>
                <td>
                    <a href="{{ url('/view_member') . '/' . $user->username }}">
                      <button class="btn btn-info" style="width: 100%;">แก้ไขข้อมูล</button>
                    </a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
