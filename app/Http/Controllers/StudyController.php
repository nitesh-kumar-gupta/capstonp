<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Study;

class StudyController extends Controller
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

    public function addNewStudy(Request $request){
        $this->validator($request->all())->validate();
        $study = new Study;
        $study->id = Auth::user()->id;
        $study->study = $request->study;
        $study->links = $request->studylink;
        $study->save();
        return $study;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'study' => 'required|max:1000'
        ]);
    }

    public function getAjaxStudy()
    {
        return view('study');
    }
    public function index(Request $request)
    {
        $studies = Study::with('user')->latest()->paginate(5);
        return response()->json($studies);
    }

    public function getLatestStudy(){
        $date =  date('Y-m-d');
        return Study::where('created_at', '>=',$date)->orderBy('created_at','DESC')->take(3)->with('user')->get();
    }
    public function getAllQuotes(){
        return Study::with('user')->get();
    }
}
