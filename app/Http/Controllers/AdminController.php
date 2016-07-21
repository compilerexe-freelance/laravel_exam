<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Hash;
use Validator;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        session(['current_menu'=>'']);
        return view('admin/main');
    }

    public function getManageExam(Request $request)
    {
        session(['current_menu'=>'ManageExam']);
        return view('admin/manage_exam')->with('id', $request->id);
    }

    public function postSaveExam(Request $request)
    {
        for ($i = 1; $i <= 25; $i++) {
            $title    = 'title_set' . $request->set . '_' . $i;
            $answer_a = 'a_set' . $request->set . '_' . $i;
            $answer_b = 'b_set' . $request->set . '_' . $i;
            $answer_c = 'c_set' . $request->set . '_' . $i;
            $answer_d = 'd_set' . $request->set . '_' . $i;
            $correct  = 'correct_set' . $request->set . '_' . $i;

            DB::table('tb_id_exam')
            ->where('level', $request->level)
            ->where('sub_level', $request->set)
            ->where('id_exam', $i)
            ->update([
                'title'     =>  $request->$title,
                'answer_a'  =>  $request->$answer_a,
                'answer_b'  =>  $request->$answer_b,
                'answer_c'  =>  $request->$answer_c,
                'answer_d'  =>  $request->$answer_d,
                'correct'   =>  $request->$correct
            ]);
        }

        return redirect()->back();
    }

    public function getPersonal()
    {
        session(['current_menu'=>'info_personal']);
        return view('admin/info_personal');
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
            $myPassword = DB::table('tb_user')->select('password')->where('username', 'admin')->first();
            if ($myPassword->password == $request->password) {
                DB::table('tb_user')->where('username', 'admin')->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email
                ]);
            } else {
                DB::table('tb_user')->where('username', 'admin')->update([
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

    public function getManageMember()
    {
        session(['current_menu'=>'ManageMember']);
        return view('admin/manage_member');
    }

    public function getViewMember(Request $request)
    {
        session(['current_menu'=>'ManageMember']);
        return view('admin/view_member')->with('username', $request->username);
    }

    public function postSaveEditMember(Request $request)
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
            $myPassword = DB::table('tb_user')->select('password')->where('username', $request->username)->first();
            if ($myPassword->password == $request->password) {
                DB::table('tb_user')->where('username', $request->username)->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email
                ]);
            } else {
                DB::table('tb_user')->where('username', $request->username)->update([
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

    public function getSearchMember()
    {
        session(['current_menu'=>'ManageMember']);
        return view('admin/search_member');
    }

    public function postViewMemberSearch(Request $request)
    {
        session(['current_menu'=>'ManageMember']);
        return view('admin/view_member_search')->with('username', $request->username);
    }

    public function postSaveEditMemberSearch(Request $request)
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
            $myPassword = DB::table('tb_user')->select('password')->where('username', $request->username)->first();
            if ($myPassword->password == $request->password) {
                DB::table('tb_user')->where('username', $request->username)->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email
                ]);
            } else {
                DB::table('tb_user')->where('username', $request->username)->update([
                    'prefix'          =>  $request->prefix,
                    'firstname'       =>  $request->firstname,
                    'lastname'        =>  $request->lastname,
                    'address'         =>  $request->address,
                    'tel'             =>  $request->tel,
                    'email'           =>  $request->email,
                    'password'        =>  Hash::make($request->password)
                ]);
            }
            return redirect()->action('AdminController@getSearchMember')->with('status', 'บันทึกข้อมูลสำเร็จ');
        }
    }

}
