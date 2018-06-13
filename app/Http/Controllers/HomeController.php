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

    public function get(Request $request) {
        $domain = $request->input('domain');
        $items = Info::where('domain_name','like','semrush.com')->get(['*']);
        return response()->json($data);
    }
}
