<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/emailmanager';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect('emailmanager');
        }else{            
            return view('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email'         => 'required|email',
            'password'      => 'required'
        ]);
        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();

        }else{
            //dd('fff');

            if(Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){
                //dd('login success');
                return redirect()->route('emailmanager-page');
            }else{
                //dd('failed');
                return redirect()->back()->with('message','Authentication failed');
                //->route('admin.index');
                //return view('admin.index');
                //return back();
            }            
        }




    }












}
