<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

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

    public function getDomains(Request $request) {
        $domain = $request->input('domain');
        $ss = '%'.$domain.'%';
        $items = Info::where('domain_name','like',$ss)->get(['*']);
        return response()->json($items);
    }

    public function getEmail(Request $request) {
        $email = $request->input('email');
        $ss = '%'.$email.'%';
        $items = Info::where('email','like',$ss)->get(['*']);
        return response()->json($items);
    }
}
