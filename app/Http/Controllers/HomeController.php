<?php

namespace App\Http\Controllers;

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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('emailmanager');
        }else{
            return redirect('login');
        }
        //return view('login');
    }


    public function login()
    {
        return view('login');
    }


    public function reg()
    {
        return view('register');
    }

    public function emanager()
    {
        return view('email-manager-page');
    }


    public function esche()
    {
        return view('email-scheduler-page');
    }





}
