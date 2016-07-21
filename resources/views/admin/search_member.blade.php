@extends('layouts/admin')

@section('content')
<div class="container">
  <div class="row">
    @if (session('status'))
      <script type="text/javascript">
        swal("บันทึกข้อมูลสำเร็จ", "", "success")
      </script>
    @endif
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-heading">
          ค้นหาผู้ใช้งาน
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <form role="form" action="{{ url('/view_member_search') }}" method="POST">
              {{ csrf_field() }}
              <div class="col-md-2 col-md-offset-2">
                ชื่อผู้ใช้งาน (username)
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" name="username">
              </div>
              <div class="col-md-2">
                  <button type="submit" class="btn btn-success" style="width: 100%;">ค้นหา</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
