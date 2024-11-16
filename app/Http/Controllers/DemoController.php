<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    public function index(){
        return view('demoHome');
    }
    public function register(Request $request){
        $request->validate(
            [
                'username'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'confirm_password'=>'required|same:password'
            ]);
        echo '<pre>';
       print_r($request->all());
    }
    // public function about(){
    //     return view('about');
    // }
}
