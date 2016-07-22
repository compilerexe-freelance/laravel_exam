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
      @if (session('status_exam_fail'))
        <script type="text/javascript">
          // swal("ทำข้อสอบไม่ผ่าน "+{{ session('status_exam_fail') }}+"/25", "", "error")
          swal({
            html: true,
            title: "คำแนะนำ",
            text: "ถ้าทำได้ถึง เวเวล 10 จะได้เรียน ฟรี กรุณาติดต่อทางร้าน" +
            "<br>ถ้าทำได้ถึง เลเวล 9 ส่วนลดค่าเรียน 50 %" +
            "<br>ถ้าทำได้ถึง เลเวล 8 ได้หนังสือฟรี 1 เล่ม" +
            "<br>ถ้าทำได้ถึงเลเวล 7 ได้รับเสื้อฟรี 1 ตัว" +
            "<br><br><font color='red'>ทำข้อสอบไม่ผ่าน " +
            {{ session('status_exam_fail') }} +
            "/25</font>"
          })
        </script>
      @endif
      @if (session('status_level_up'))
        <script type="text/javascript">
          // swal("ทำข้อสอบสำเร็จ "+{{ session('status_level_up') }}+"/25", "", "success")
          swal({
            html: true,
            title: "คำแนะนำ",
            text: "ถ้าทำได้ถึง เวเวล 10 จะได้เรียน ฟรี กรุณาติดต่อทางร้าน" +
            "<br>ถ้าทำได้ถึง เลเวล 9 ส่วนลดค่าเรียน 50 %" +
            "<br>ถ้าทำได้ถึง เลเวล 8 ได้หนังสือฟรี 1 เล่ม" +
            "<br>ถ้าทำได้ถึงเลเวล 7 ได้รับเสื้อฟรี 1 ตัว" +
            "<br><br><font color='green'>ทำข้อสอบผ่าน " +
            {{ session('status_level_up') }} +
            "/25</font>"
          })
        </script>
      @endif

      @if ($status_level_reset == 'reset')
        <script type="text/javascript">
          // swal("รีเซ็ตระดับเลเวล", "", "error")
          swal({
            html: true,
            title: "คำแนะนำ",
            text: "ถ้าทำได้ถึง เวเวล 10 จะได้เรียน ฟรี กรุณาติดต่อทางร้าน" +
            "<br>ถ้าทำได้ถึง เลเวล 9 ส่วนลดค่าเรียน 50 %" +
            "<br>ถ้าทำได้ถึง เลเวล 8 ได้หนังสือฟรี 1 เล่ม" +
            "<br>ถ้าทำได้ถึงเลเวล 7 ได้รับเสื้อฟรี 1 ตัว" +
            "<br><br><font color='red'>รีเซ็ตระดับเลเวล "
          })
        </script>
      @endif

      @if (session('status_level_reset'))
        <script type="text/javascript">
          // swal("รีเซ็ตระดับเลเวล", "", "error")
          swal({
            html: true,
            title: "คำแนะนำ",
            text: "ถ้าทำได้ถึง เวเวล 10 จะได้เรียน ฟรี กรุณาติดต่อทางร้าน" +
            "<br>ถ้าทำได้ถึง เลเวล 9 ส่วนลดค่าเรียน 50 %" +
            "<br>ถ้าทำได้ถึง เลเวล 8 ได้หนังสือฟรี 1 เล่ม" +
            "<br>ถ้าทำได้ถึงเลเวล 7 ได้รับเสื้อฟรี 1 ตัว" +
            "<br><br><font color='red'>รีเซ็ตระดับเลเวล " +
            {{ session('status_exam_fail') }} +
            "/25</font>"
          })
        </script>
      @endif
      <div class="col-md-10 col-md-offset-1">
        <strong style="color: red;">*** หมายเหตุ ทุกครั้งที่มีการรีเฟรชหน้าข้อสอบใหม่จะถูกนับจำนวนการทำข้อสอบ 1 ครั้ง ***</strong>
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
                      <input type="radio" id="id_exam_{{ $exam->id_exam }}" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[0] }}">
                      {{ $input[0] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="id_exam_{{ $exam->id_exam }}" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[1] }}">
                      {{ $input[1] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="id_exam_{{ $exam->id_exam }}" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[2] }}">
                      {{ $input[2] }}
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" id="id_exam_{{ $exam->id_exam }}" name="id_exam_{{ $exam->id_exam }}" value="{{ $input[3] }}">
                      {{ $input[3] }}
                    </label>
                  </div>
                  <hr size="1">
                </div>
              </div>

              <?php $id++; ?>

            @endforeach

            <div class="col-md-12 text-center">
              <button type="submit" id="btn_submit" class="btn btn-success" style="width: 15%">ส่งคำตอบ</button>
            </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      var id_1 = 0, id_2 = 0, id_3 = 0, id_4 = 0, id_5 = 0, id_6 = 0, id_7 = 0, id_8 = 0, id_9 = 0, id_10 = 0,
          id_11 = 0, id_12 = 0, id_13 = 0, id_14 = 0, id_15 = 0, id_16 = 0, id_17 = 0, id_18 = 0, id_19 = 0, id_20 = 0,
          id_21 = 0, id_22 = 0, id_23 = 0, id_24 = 0, id_25 = 0;
      var ready_send = 0;
      $('#btn_submit').attr('disabled', true);

      setInterval(function() {

        if ($("input[name='id_exam_1']").is(':checked')) {  if (id_1 == 0) { ready_send++; id_1 = 1; } }
        if ($("input[name='id_exam_2']").is(':checked')) {  if (id_2 == 0) { ready_send++; id_2 = 1; } }
        if ($("input[name='id_exam_3']").is(':checked')) {  if (id_3 == 0) { ready_send++; id_3 = 1; } }
        if ($("input[name='id_exam_4']").is(':checked')) {  if (id_4 == 0) { ready_send++; id_4 = 1; } }
        if ($("input[name='id_exam_5']").is(':checked')) {  if (id_5 == 0) { ready_send++; id_5 = 1; } }
        if ($("input[name='id_exam_6']").is(':checked')) {  if (id_6 == 0) { ready_send++; id_6 = 1; } }
        if ($("input[name='id_exam_7']").is(':checked')) {  if (id_7 == 0) { ready_send++; id_7 = 1; } }
        if ($("input[name='id_exam_8']").is(':checked')) {  if (id_8 == 0) { ready_send++; id_8 = 1; } }
        if ($("input[name='id_exam_9']").is(':checked')) {  if (id_9 == 0) { ready_send++; id_9 = 1; } }
        if ($("input[name='id_exam_10']").is(':checked')) {  if (id_10 == 0) { ready_send++; id_10 = 1; } }
        if ($("input[name='id_exam_11']").is(':checked')) {  if (id_11 == 0) { ready_send++; id_11 = 1; } }
        if ($("input[name='id_exam_12']").is(':checked')) {  if (id_12 == 0) { ready_send++; id_12 = 1; } }
        if ($("input[name='id_exam_13']").is(':checked')) {  if (id_13 == 0) { ready_send++; id_13 = 1; } }
        if ($("input[name='id_exam_14']").is(':checked')) {  if (id_14 == 0) { ready_send++; id_14 = 1; } }
        if ($("input[name='id_exam_15']").is(':checked')) {  if (id_15 == 0) { ready_send++; id_15 = 1; } }
        if ($("input[name='id_exam_16']").is(':checked')) {  if (id_16 == 0) { ready_send++; id_16 = 1; } }
        if ($("input[name='id_exam_17']").is(':checked')) {  if (id_17 == 0) { ready_send++; id_17 = 1; } }
        if ($("input[name='id_exam_18']").is(':checked')) {  if (id_18 == 0) { ready_send++; id_18 = 1; } }
        if ($("input[name='id_exam_19']").is(':checked')) {  if (id_19 == 0) { ready_send++; id_19 = 1; } }
        if ($("input[name='id_exam_20']").is(':checked')) {  if (id_20 == 0) { ready_send++; id_20 = 1; } }
        if ($("input[name='id_exam_21']").is(':checked')) {  if (id_21 == 0) { ready_send++; id_21 = 1; } }
        if ($("input[name='id_exam_22']").is(':checked')) {  if (id_22 == 0) { ready_send++; id_22 = 1; } }
        if ($("input[name='id_exam_23']").is(':checked')) {  if (id_23 == 0) { ready_send++; id_23 = 1; } }
        if ($("input[name='id_exam_24']").is(':checked')) {  if (id_24 == 0) { ready_send++; id_24 = 1; } }
        if ($("input[name='id_exam_25']").is(':checked')) {  if (id_25 == 0) { ready_send++; id_25 = 1; } }

        if (ready_send == 25) {
          $('#btn_submit').attr('disabled', false);
        }

      }, 1000);

    });
  </script>

@endsection
