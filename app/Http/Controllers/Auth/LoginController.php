<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function post(Request $request){

        $username = $request->username;
        $messages = [
            "username.required" => "Masukkan Username",
            "username.alpha" => "Hanya Alphabet dan Tidak ada Spasi",
            "password.required" => "Masukkan Password",
            "password.min" => "Password must be at least 6 characters"
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha|max:30',
            'password' => 'required|min:6'
        ], $messages);

        $remember_me = $request->has('remember-me') ? true : false;

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{

            if (Auth::attempt(['username' => $username, 'password' => $request->password], $remember_me)) {
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->back()->withInput($request->only('password', 'remember-me'))->withErrors([
                    'password' => 'Password Salah.' ]);

            }
        }


    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function index(){
        return view('login.login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}


