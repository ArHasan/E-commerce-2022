<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function test() {
        return 'hi';
    }

    /* admin after login */
    public function admin() {
        return view('admin.home');
    }

    /* admin logout */
    public function adminLogout() {
        Auth::logout();
        $notification = array('massage'=>'You are logged out ', 'alert-type'=>'success');
        return redirect()->route('admin.login')->with($notification);
    }

}
