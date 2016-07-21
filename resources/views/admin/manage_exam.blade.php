@extends('layouts/admin')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h4>จัดการข้อสอบ ระดับ {{ $id }}</h4>
          </div>
          <div class="panel-body">

            <!-- Exam Set 1 -->

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_exam/1') }}">

              <input type="hidden" name="level" value="<?php echo $id; ?>">

              {{ csrf_field() }}
              <h3>โจทย์ข้อสอบ ชุด 1</h3>
              <hr size="1">

              <?php $id_exams = DB::table('tb_id_exam')->where('level', $id)->where('sub_level', 1)->get() ?>

              @foreach ($id_exams as $id_exam)

                <div class="form-group">
                  <label class="col-md-4 control-label">ข้อ {{ $id_exam->id_exam }}</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="title_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->title; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ก.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="a_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_a; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ข.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="b_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_b; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ค.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="c_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_c; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ง.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="d_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_d; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" style="color: #006600;">เฉลย</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" style="background-color: #e6ffe6;" name="correct_set1_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->correct; ?>">
                  </div>
                </div>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4 text-right">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-save"></i> บันทึกข้อสอบ ชุด 1
                  </button>
                </div>
              </div>

            </form>

            <!-- Exam Set 2 -->

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_exam/2') }}">

              {{ csrf_field() }}
              <h3>โจทย์ข้อสอบ ชุด 2</h3>
              <hr size="1">

              <?php $id_exams = DB::table('tb_id_exam')->where('level', $id)->where('sub_level', 2)->get() ?>

              @foreach ($id_exams as $id_exam)

                <div class="form-group">
                  <label class="col-md-4 control-label">ข้อ {{ $id_exam->id_exam }}</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="title_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->title; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ก.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="a_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_a; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ข.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="b_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_b; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ค.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="c_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_c; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ง.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="d_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_d; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" style="color: #006600;">เฉลย</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" style="background-color: #e6ffe6;" name="correct_set2_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->correct; ?>">
                  </div>
                </div>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4 text-right">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-save"></i> บันทึกข้อสอบ ชุด 2
                  </button>
                </div>
              </div>

            </form>

            <!-- Exam Set 3 -->

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_exam/3') }}">

              {{ csrf_field() }}
              <h3>โจทย์ข้อสอบ ชุด 3</h3>
              <hr size="1">

              <?php $id_exams = DB::table('tb_id_exam')->where('level', $id)->where('sub_level', 3)->get() ?>

              @foreach ($id_exams as $id_exam)

                <div class="form-group">
                  <label class="col-md-4 control-label">ข้อ {{ $id_exam->id_exam }}</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="title_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->title; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ก.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="a_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_a; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ข.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="b_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_b; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ค.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="c_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_c; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">ง.</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="d_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_d; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" style="color: #006600;">เฉลย</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" style="background-color: #e6ffe6;" name="correct_set3_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->correct; ?>">
                  </div>
                </div>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4 text-right">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-save"></i> บันทึกข้อสอบ ชุด 3
                  </button>
                </div>
              </div>

            </form>

            <!-- Exam Set 4 -->

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_exam/4') }}">

              {{ csrf_field() }}
              <h3>โจทย์ข้อสอบ ชุด 4</h3>
              <hr size="1">

              <?php $id_exams = DB::table('tb_id_exam')->where('level', $id)->where('sub_level', 4)->get() ?>

              @foreach ($id_exams as $id_exam)

              <div class="form-group">
                <label class="col-md-4 control-label">ข้อ {{ $id_exam->id_exam }}</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="title_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->title; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">ก.</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="a_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_a; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">ข.</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="b_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_b; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">ค.</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="c_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_c; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">ง.</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="d_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->answer_d; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label" style="color: #006600;">เฉลย</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" style="background-color: #e6ffe6;" name="correct_set4_<?php echo $id_exam->id_exam; ?>" value="<?php echo $id_exam->correct; ?>">
                </div>
              </div>

              @endforeach

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4 text-right">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-save"></i> บันทึกข้อสอบ ชุด 4
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
