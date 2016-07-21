@extends('layouts/user')

@section('content')
  <?php
    $info = DB::table('tb_statistic')
    ->where('username', Auth::User()->username)->first();

    $sub_level = rand(1,4);

    $exams  = DB::table('tb_id_exam')
    ->where('level', $info->level)
    ->where('sub_level', $sub_level)
    ->orderByRaw('RAND()')->take(25)->get();

    $id = 1;
  ?>
  <div class="container">
    <div class="row">
      @if (session('status_level_up'))
        <script type="text/javascript">
          swal("ทำข้อสอบสำเร็จ", "", "success")
        </script>
      @endif
      @if (session('status_level_reset'))
        <script type="text/javascript">
          swal("รีเซ็ตระดับเลเวล", "", "error")
        </script>
      @endif
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
          <div class="panel-heading">
            เริ่มทำข้อสอบ ระดับเลเวล {{ $info->level }} ชุดที่ {{ $sub_level }}
          </div>
          <div class="panel-body">
            <form action="{{ URL('/send_answer') }}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="level" value="{{ $info->level }}">
            <input type="hidden" name="sub_level" value="{{ $info->sub_level }}">

            @foreach ($exams as $exam)

              <?php
              $input = array($exam->answer_a, $exam->answer_b, $exam->answer_c, $exam->answer_d);
              shuffle($input);
              ?>

              <div class="form-horizontal">
                <div class="form-group col-md-12">
                  ข้อ {{ $id }} - {{ $exam->title }}
                  <div class="radio">
                    <label>
                      <input type="radio" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[0] }}">
                      {{ $input[0] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[1] }}">
                      {{ $input[1] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[2] }}">
                      {{ $input[2] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[3] }}">
                      {{ $input[3] }}
                    </label>
                  </div>
                  <hr size="1">
                </div>
              </div>

              <?php $id++; ?>

            @endforeach

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-success" style="width: 15%">ส่งคำตอบ</button>
            </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
