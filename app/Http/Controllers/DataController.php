<?php

namespace App\Http\Controllers;

use App\Data;
use App\Jobs\ProcessData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $options = (new Data)->fillable;

        // Check if no one is messing with the get method
        if(count($request->column) > 0 && $request->value == ''){
            Session::flash('error', __('data.no_results'));
            return redirect()->route('data.index');
        }

        // If column exists, return the results
        if($request->column){
            $rows = Data::where($request->column, 'LIKE', "%$request->value%")->get();
            $total = count($rows);
            if($total === 0){
                Session::flash('error', __('data.no_results'));
                return redirect()->route('data.index');
            }
            $return = true;
            return view('data.index', compact('rows', 'options', 'total', 'request'));
        }

        $rows = Data::paginate(10);
        $total = $rows->total();
        return view('data.index', compact('rows', 'options', 'total'));
    }

    public function create()
    {
        // Session::flush();
        return view('data.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('data');
        $validator = Validator::make($request->all(), [
            'data'          => 'required|file|mimes:txt'
        ]);
        if($validator->fails()){
            $msg = $validator->messages()->messages()['data'][0];
            Session::flash('error', $msg);
            return view('data.create');
        }

        $filename = $this->getFileName($file);
        $file->storeAs('tmp', $filename);
        ProcessData::dispatch($filename);
        Session::flash('success', __('data.loaded'));
        return redirect()->route('data.index');
    }

    public function getFileName($file)
    {
        return str_random(16) . '.' . $file->extension();
    }
}
