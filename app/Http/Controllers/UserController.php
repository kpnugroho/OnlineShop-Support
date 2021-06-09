<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $input = $request->all();
        $validator = \Validator::make(
            $request->all(), 
                [
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
                ]
        );

        if ($validator->fails()) {
                  return redirect()->back()
                                  ->withErrors($validator)
                                  ->withInput($input);
        }

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
                    return redirect('/user/register')->with('status', 'Email Sudah Terdaftar!')->withInput($input);
                }   
            } else {
                //insert error value ke dalam session status dan return ke view form login
                return redirect('/user/register')->with('status', 'No Whatsapp Sudah Terdaftar!')->withInput($input);
            }         
        } else {
            //insert error value ke dalam session status dan return ke view form login
            return redirect('/user/register')->with('status', 'No Telphone Sudah Terdaftar!')->withInput($input);
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
        $model = DB::table('tblUser')->where('user_id', $id)->first();
        Session::put('menuActive', 'change_password');
        return view('user.edit', ['model' => $model]);
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
        //Validasi inputan dan set pesan error
        $validator = Validator::make($request->all(), [
            'email'                 =>'required',
            'no_telp'               =>'required',
            'password_lama'         =>'required|min:6',
            'password_baru'         =>'required|min:6',
            'password_confirmation' =>'required|min:6|same:password_baru'
        ],
        [
            'email.required'                => 'Email Masih Kosong!',
            'no_telp.required'              => 'No Telphone Masih Kosong!',
            'password_lama.required'        => 'Password Lama Masih Kosong!',
            'password_lama.min'             => 'Password Lama Minimal 6 Character!',
            'password_baru.required'        => 'Password Baru Masih Kosong!',
            'password_baru.min'             => 'Password Baru Minimal 6 Character!',
            'password_confirmation.required'=> 'Konfirmasi Password Baru Masih Kosong!',
            'password_confirmation.min'     => 'Konfirmasi Password Baru Minimal 6 Character!',
            'password_confirmation.same'    => 'Password Konfirmasi dan Password Baru Harus Sama!'
        ]); 

        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 404);
        }

        //Check no telp ke database
        $checkPassOld = DB::table('tbluser')
            ->where('user_id', $id)
            ->first();

        // dd($checkPassOld->password. "   -   " .Hash::make($request->password_baru));

        if(Hash::check($request->password_lama, $checkPassOld->password)) {
            $message = "";
            DB::beginTransaction();

            try {
                DB::table('tblUser')
                            ->where('user_id', $id)
                            ->update([
                                'password' => Hash::make($request->password_baru),
                                'update_on' => now()
                            ]);

                DB::commit();
                $message = "Perubahan Password Berhasil!";
            } catch (Exception $e) {
                DB::rollback();
                $message = "Perubahan Password Gagal, Silahkan Coba Lagi!";
            }

            return redirect('/user/'.$id.'/edit')->with('status', $message);
        } else {
            return redirect('/user/'.$id.'/edit')->with('status', 'Password Lama Tidak Sesuai!')->withInput($input);
        }
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
