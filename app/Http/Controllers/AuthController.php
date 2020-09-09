<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Session;


class AuthController extends Controller
{

    //    public function __contructor
    //
    public function signInShow(Request $request)
    {
        return view('signin');
    }
    public function signUpShow()
    {
        return view('signup');
    }
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $password = $request->input('password');
        $user->password = Hash::make($password);

        $user->save();

        $this->loginUser($user);

        return redirect(route('admin'));
    }
    public function signIn(Request $request)
    {


        $email = $request->input('email');
        $password = $request->input('password');

        // Neu khong co user/ password -> redirect quay tro lai, bao dien vao.
        // Validate
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        // Lay ra user, khong co user thi 

        $user = User::where('email', $email)->first();
        if (!$user) {
            return view('signin', [
                'authUser' => null,
                'message' => "Email này không tồn tại"
            ]);
        }

        $isAuthenticated = Hash::check($password, $user->password);
        if (!$isAuthenticated) {
            return view('signin', [
                'authUser' => null,
                'message' => "Sai mật khẩu"
            ]);
        }

        $this->loginUser($user);

        return redirect(route('admin'));
    }

    public function signOut(Request $request)
    {
        $request->session()->forget('user');
        return redirect(route('signInForm'));
    }

    private function loginUser($user)
    {
        Session::put('user', $user);
        // $request->session()->put('user', $user);
    }
}
