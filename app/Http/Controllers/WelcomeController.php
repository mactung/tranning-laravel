<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

   
    //
    public function show (Request $request){
        $user = $request->session()->get('user');
        return view('welcome', ['user' => $user ]);
    }
}
