<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Branch;
use App\Course;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        $courses = Course::all();
        return view('profile')->with(array('branches'=>$branches,'courses'=>$courses));
    }
    public function update(Request $request){
        $user = User::where('reg_id', $request->reg_id)->first();
        $this->validator($request->all(), $user->id)->validate();
        $update = array(
            'email' => $request->email,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'batch' => $request->batch,
            'branch' => $request->branch,
            'semester' => $request->semester,
            'course' => $request->course,
            'about_me' => $request->about_me,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zip' => $request->zip
        );
        return User::where('reg_id',$request->reg_id)->update($update);
    }
    protected function validator(array $data, $id)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required|max:255',
            'email' =>  'required|max:255|email|unique:users,email,'.$id,
            'batch' => 'required',
            'branch' => 'required',
            'course' => 'required',
            'semester' => 'required'
        ]);
    }
    public function updateImage(Request $request){
        return User::where('reg_id',$request->reg_id)->update(array('profile_image' => $request->profile_image));
    }
    public function profile($id){
        $user = User::where('id', $id)->first();
        return view('viewprofile')->with(array('user'=>$user));
    }
}
