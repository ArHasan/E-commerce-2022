<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::Admin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /* admin login */
     public function adminLogin() {
        return view('auth.admin_login');
    }

    // public function login(Request $request)
    // {
    //      $validated = $request->validate([
    //          'email' => 'required|email',
    //          'password' => 'required',
    //      ]);

    //      if (auth()->attempt(array('email' =>$request->email ,'password' =>$request->password ))) {
                
    //         if (auth()->user()->is_admin==1) {
    //             return redirect()->route('admin');    
    //         }else{  
    //             return redirect()->back();
    //         }
    //      }else{
    //         return redirect()->back()->with('error','Invalid email or password');
    //      }

    // }



}
