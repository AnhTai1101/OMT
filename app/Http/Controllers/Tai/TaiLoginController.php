<?php

namespace App\Http\Controllers\Tai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TaiLoginController extends Controller
{
    function home(){
        return view('tai.login');
    }

    //trang chu
    function index(){
        return view('welcome');
    }

    //login
    public function postLogin(Request $req){
        //
        $login = $req;  //->only('name','password');
        // dd(Hash::make($login->password));
        if(Auth::attempt(['name'=>$login->name, 'password'=>$login->password])){
            // return redirect(route('home1'));
            return redirect(route('home1'));
        }else{
            return redirect(route('tai-login'));
        }
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect(route('tai-login'));
    }
}
