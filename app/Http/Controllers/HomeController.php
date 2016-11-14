<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        /**
         * Return the dashboards if the user is logged in
         */
        if(Auth::check()){
            if(Auth::user()->user_type == 1){
                return view('users.doctor');
            }elseif(Auth::user()->user_type == 2){
                return view('users.receptionist');
            }elseif(Auth::user()->user_type == 3){
                return view('users.patient');
            }
        }

        /**
         * Return the welcome page if the user is not logged in
         */
        return view('welcome');


    }
}
