<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Quote;

class HomeController extends Controller
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
        return view('home');
    }
    public function mypost(Request $request){
        $this->validator($request->all())->validate();
        $quote = new Quote;
        $quote->id = Auth::user()->id;
        $quote->quote = $request->quote;
        $quote->save();
        return $quote;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'quote' => 'required|max:1000'
        ]);
    }
    public function getQuotes(){
        return Quote::with('user')->get();
    }
}
