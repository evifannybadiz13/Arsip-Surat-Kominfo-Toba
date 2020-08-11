<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabid;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class KabidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabid = Kabid::all();
        return view('kabid.index',compact('kabid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "NIP.required" => "Masukkan NIP Pengguna",
            "NIP.size" => "Jumlah NIP Tidak Sesuai",
            "nama.required" => "Masukkan Nama Pengguna",
            "username.required" => "Masukkan Username",
            "username.unique" => "Username Sudah Ada",
            "username.alpha" => "Hanya Alphabet dan Tidak ada Spasi",
            "email.required" => "Masukkan Email Pengguna",
            "email.email" => "Pastikan Email yang dimasukkan benar",
            "password.required" => "Masukkan Password Pengguna",
            "password.min" => "Password Harus Lebih Dari 6 Karakter",
            "bidang.required" => "Pilih Bidang Pengguna"
        ];

        $validator = Validator::make($request->all(), [
            'NIP' => 'required|size:16',
            'nama' => 'required',
            'username' => 'required|alpha|unique:users|max:30',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'bidang'=>'required'
        ], $messages);


        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{

            $user = new User;
            $user->role = $request->bidang;
            $user->name = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $user->remember_token =  Str::random(60);
            $user->save();

            $kabid = new Kabid;
            $kabid->user_id = $user->id;
            $kabid->NIP = $request->NIP;
            $kabid->nama = $request->nama;
            $kabid->email = $request->email;
            $kabid->bidang = $request->bidang;
            $kabid->save();
            return redirect('/kabid');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabid= Kabid::find($id);
        $user = User::find($kabid->user_id);
        return view('kabid.view',compact('kabid','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kabid=Kabid::find($id);
        $user = User::find($kabid->user_id);
        return view('kabid.edit', compact('kabid', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            "NIP.required" => "Masukkan NIP Pengguna",
            "NIP.size" => "Jumlah NIP Tidak Sesuai",
            "nama.required" => "Masukkan Nama Pengguna",
            "username.required" => "Masukkan Username",

            "username.alpha" => "Hanya Alphabet dan Tidak ada Spasi",
            "email.required" => "Masukkan Email Pengguna",
            "email.email" => "Anda Lupa Menggunakan @",
            "password.required" => "Masukkan Password Pengguna",
            "password.min" => "Password Harus Lebih Dari 6 Karakter",
            "bidang.required" => "Pilih Bidang Pengguna"
        ];


        $validator = Validator::make($request->all(), [
            'NIP' => 'required|size:16',
            'nama' => 'required',
            'username' => 'required|alpha|max:30',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'bidang'=>'required'
        ], $messages);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{

            $kabid=Kabid::find($id);
            $user = User::find($kabid->user_id);
            $user->name = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request['password']);
            $user->remember_token = Str::random(60);
            $user->save();

            $kabid->NIP = $request->NIP;
            $kabid->nama = $request->nama;
            $kabid->email = $request->email;
            $kabid->bidang = $request->bidang;
            $kabid->save();
            return redirect('/kabid');

        }

        $kabid=Kabid::find($id);
        $user = User::find($kabid->user_id);
        $kabid->NIP = $request->NIP;
        $kabid->nama = $request->nama;
        $user->username = $request->username;
        $kabid->email = $request->email;
        $kabid->password = Hash::make($request['password']);
        $kabid->bidang = $request->bidang;
        $kabid->save();

        return redirect('/kabid');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kabid=Kabid::find($id);
        $user = User::find($kabid->user_id);
        $kabid->delete();
        $user->delete();

        return redirect('/kabid');
    }
}
