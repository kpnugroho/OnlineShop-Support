<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;
use App\tblUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi inputan dan set pesan error
        $request->validate([
            'namaDepan'=>'required',
            'namaBelakang'=>'required',
            'noTelp'=>'required|numeric',
            'noWa'=>'required|numeric',
            'email'=>'required|email',
            'password'=>'required|min:6',
        ],
        [
            'namaDepan.required' => 'Nama Depan Masih Kosong!',
            'namaBelakang.required'  => 'Nama Belakang Masih Kosong!',
            'noTelp.required'  => 'No Telp Masih Kosong!',
            'noTelp.numeric'  => 'No Telp Harus Angka!',
            'noWa.required'  => 'No Whatsapp Masih Kosong!',
            'noWa.numeric'  => 'No Whatsapp Harus Angka!',
            'email.required'  => 'Email Masih Kosong!',
            'email.email'  => 'Email Tidak Valid!',
            'password.required'  => 'Password Masih Kosong!',
            'password.min'  => 'Password Minimal 6 Character!'
        ]);

        //parameter inputan ditampung ke dalam varibale
        $noTelp = $request->noTelp;
        $noWa = $request->noWa;
        $email = $request->email;
        $password = $request->password;

        //Check no telp ke database
        $checkTelp = DB::table('tbluser')
            ->where('no_telp', $noTelp)
            ->first();

        if($checkTelp == null) {

             //Check no WA ke database
            $checkWa = DB::table('tbluser')
                ->where('no_wa', $noWa)
                ->first();

            if($checkWa == null) {

                 //Check email database
                $checkEmail = DB::table('tbluser')
                    ->where('email', $email)
                    ->first();

                if($checkEmail == null) {

                    $message = "";
                    DB::beginTransaction();

                    try {
                        DB::table('tblUser')->insert([
                            'nama_depan'       => $request->namaDepan,
                            'nama_belakang'    => $request->namaBelakang,
                            'no_telp'          => $request->noTelp,
                            'no_wa'            => $request->noWa,
                            'email'            => $request->email,
                            'password'         => Hash::make($request->password),
                            'is_trial'         => 1,
                            'is_member'        => 0,
                            'create_on'         => now()
                        ]);
        
                        DB::commit();
                        $message = "Registrasi Berhasil!";
                    } catch (Exception $e) {
                        DB::rollback();
                        $message = "Registrasi Gagal, Silahkan Coba Lagi!";
                    }

                    return redirect('/user/register')->with('status', $message);

                } else {
                    //insert error value ke dalam session status dan return ke view form login
                    return redirect('/user/register')->with('status', 'Email Sudah Terdaftar!');
                }   
            } else {
                //insert error value ke dalam session status dan return ke view form login
                return redirect('/user/register')->with('status', 'No Whatsapp Sudah Terdaftar!');
            }         
        } else {
            //insert error value ke dalam session status dan return ke view form login
            return redirect('/user/register')->with('status', 'No Telphone Sudah Terdaftar!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
