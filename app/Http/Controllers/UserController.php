<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Hash;
use Validator;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        session(['current_menu'=>'']);
        return view('user/home');
    }

    public function getPersonal()
    {
        session(['current_menu'=>'info_personal']);
        return view('user/info_personal');
    }

    public function postSavePersonal(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'prefix'                  =>  'required',
            'firstname'               =>  'required',
            'lastname'                =>  'required',
            'address'                 =>  'required',
            'tel'                     =>  'required',
            'email'                   =>  'required',
            'username'                =>  'required',
            'password'                =>  'required|confirmed|min:4',
            'password_confirmation'   =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $myPassword = DB::table('tb_user')->select('password')->where('username', Auth::User()->username)->first();
            if ($myPassword->password == $request->password) {
                DB::table('tb_user')->where('username', Auth::User()->username)->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email
                ]);
            } else {
                DB::table('tb_user')->where('username', Auth::User()->username)->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email,
                    'password'        =>  Hash::make($request->password)
                ]);
            }
            return redirect()->back()->with('status', 'บันทึกข้อมูลสำเร็จ');
        }
    }

    public function getStartExam()
    {
        session(['current_menu'=>'start_exam']);
        return view('user/start_exam');
    }

    public function postSendAnswer(Request $request)
    {
        $correct_id_1 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 1)->first();
        $correct_id_2 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 2)->first();
        $correct_id_3 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 3)->first();
        $correct_id_4 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 4)->first();
        $correct_id_5 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 5)->first();
        $correct_id_6 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 6)->first();
        $correct_id_7 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 7)->first();
        $correct_id_8 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 8)->first();
        $correct_id_9 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 9)->first();
        $correct_id_10 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 10)->first();
        $correct_id_11 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 11)->first();
        $correct_id_12 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 12)->first();
        $correct_id_13 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 13)->first();
        $correct_id_14 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 14)->first();
        $correct_id_15 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 15)->first();
        $correct_id_16 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 16)->first();
        $correct_id_17 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 17)->first();
        $correct_id_18 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 18)->first();
        $correct_id_19 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 19)->first();
        $correct_id_20 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 20)->first();
        $correct_id_21 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 21)->first();
        $correct_id_22 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 22)->first();
        $correct_id_23 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 23)->first();
        $correct_id_24 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 24)->first();
        $correct_id_25 = DB::table('tb_id_exam')->where('level', $request->level)->where('sub_level', $request->sub_level)->where('id_exam', 25)->first();
        $score = 0;

        if ($request->id_exam_1 == $correct_id_1->correct) {$score++;}
        if ($request->id_exam_2 == $correct_id_2->correct) {$score++;}
        if ($request->id_exam_3 == $correct_id_3->correct) {$score++;}
        if ($request->id_exam_4 == $correct_id_4->correct) {$score++;}
        if ($request->id_exam_5 == $correct_id_5->correct) {$score++;}
        if ($request->id_exam_6 == $correct_id_6->correct) {$score++;}
        if ($request->id_exam_7 == $correct_id_7->correct) {$score++;}
        if ($request->id_exam_8 == $correct_id_8->correct) {$score++;}
        if ($request->id_exam_9 == $correct_id_9->correct) {$score++;}
        if ($request->id_exam_10 == $correct_id_10->correct) {$score++;}
        if ($request->id_exam_11 == $correct_id_11->correct) {$score++;}
        if ($request->id_exam_12 == $correct_id_12->correct) {$score++;}
        if ($request->id_exam_13 == $correct_id_13->correct) {$score++;}
        if ($request->id_exam_14 == $correct_id_14->correct) {$score++;}
        if ($request->id_exam_15 == $correct_id_15->correct) {$score++;}
        if ($request->id_exam_16 == $correct_id_16->correct) {$score++;}
        if ($request->id_exam_17 == $correct_id_17->correct) {$score++;}
        if ($request->id_exam_18 == $correct_id_18->correct) {$score++;}
        if ($request->id_exam_19 == $correct_id_19->correct) {$score++;}
        if ($request->id_exam_20 == $correct_id_20->correct) {$score++;}
        if ($request->id_exam_21 == $correct_id_21->correct) {$score++;}
        if ($request->id_exam_22 == $correct_id_22->correct) {$score++;}
        if ($request->id_exam_23 == $correct_id_23->correct) {$score++;}
        if ($request->id_exam_24 == $correct_id_24->correct) {$score++;}
        if ($request->id_exam_25 == $correct_id_25->correct) {$score++;}

        if ($score >= 17) {
            $info_level = DB::table('tb_statistic')->where('username', Auth::User()->username)->first();
            $level  = $info_level->level;
            if ($level < 10) {
                $level++;
                DB::table('tb_statistic')->where('username', Auth::User()->username)->update([
                    'level'   =>   $level,
                    'fail'    =>   0
                ]);
            } else {
              return 'Your max level 10';
            }
            return redirect()->back()->with('status_level_up', 'success');
        } else {
            $info_fail = DB::table('tb_statistic')->where('username', Auth::User()->username)->first();
            $fail  = $info_fail->fail;
            if ($fail < 3) {
                $fail++;
                DB::table('tb_statistic')->where('username', Auth::User()->username)->update([
                    'fail'   =>   $fail
                ]);
                return redirect()->back();
            } else {
                DB::table('tb_statistic')->where('username', Auth::User()->username)->update([
                    'level'   =>   1,
                    'fail'    =>   0
                ]);
                return redirect()->back()->with('status_level_reset', 'success');
            }
        }
    }

}
