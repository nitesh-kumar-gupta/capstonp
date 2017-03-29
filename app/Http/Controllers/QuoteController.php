<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Quote;

class QuoteController extends Controller
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

    public function addNewQuote(Request $request){
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

    public function getAjaxQuote()
    {
        return view('quote');
    }
    public function index(Request $request)
    {
        $items = Quote::with('user')->latest()->paginate(5);
        return response()->json($items);
    }

    public function getRandomQuotes(){
        $date =  date('Y-m-d');
        return Quote::where('created_at', '>=',$date)->orderByRaw('RAND()')->take(3)->with('user')->get();
    }
    public function getAllQuotes(){
        return Quote::with('user')->get();
    }
}
