<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

        
        $messages = [
            "name.required" => "Masukkan Nama Lengkap",
            "name.min" => "Minimal 5 Karakter atau Huruf",
            "name.max" => "Maksimal 50 Karakter atau Huruf",
            "username.required" => "Masukkan Username",
            "username.alpha" => "Hanya Alphabet dan Tidak ada Spasi",
            "email.email" => "Silakan Masukkan Email Dengan Benar",
            "password.required" => "Masukkan Password",
            "password.min" => "Minimal 6 Karakter atau Huruf"
        ];

        $validator = validator::make($request->all(),[
            'name' => 'required|min:5|max:50',
            'username' => 'required|alpha|max:30|unique:users',
            'email' => 'email',
            'password' => 'required|min:6',
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(); 
        }else{
              
            $user = new User;
            $user->role ='admin';
            $user->username = $request->username;
            $user->name = $request->name;      
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $user->remember_token =  Str::random(60);
            $user->save();
            return  redirect('/login')->with('success','Data Berhasil Diinput');

        }
      

       
    }




    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('register.register');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
