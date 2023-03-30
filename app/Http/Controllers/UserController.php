<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

class UserController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                 case '2':
                    return redirect()->intended('/catatan');
                    break;

            }
        }
        return view('auth.login');
    }
    public function cekLogin(AuthRequest $request){
        // return $request;
        $credential = $request->only('email', 'password');
        // dd($credenial);
        $request->session()->regenerate();
        if(Auth::attempt($credential)){
            $user = Auth::user();
            switch ($user->level){
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('catatan');
                    break;
            }

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nofound' => 'email or password is wrong'
        ])->onlyInput('email');
    }

    public function logout(request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect ('/login');
    }

}
