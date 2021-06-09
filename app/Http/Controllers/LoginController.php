<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\session;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;
use App\tblUser;

class LoginController extends Controller
{
    public function getLogin() {
        return view('login');  
    }

    public function getHome() {
        return view('home.index');  
    }

    public function postLogin(request $request)
    {
        //Validasi inputan dan set pesan error
        $input = $request->all();
        $validator = \Validator::make(
            $request->all(), 
                [
                    'noTelp'=>'required',
                    'password'=>'required'
                ],
                [
                    'noTelp.required' => 'No Telphone Masih Kosong!',
                    'password.required'  => 'Password Masih Kosong!'
                ]
        );

        if ($validator->fails()) {
                  return redirect()->back()
                                  ->withErrors($validator)
                                  ->withInput($input);
        }

        // $request->validate([
        //     'noTelp'=>'required',
        //     'password'=>'required'
        // ],
        // [
        //     'noTelp.required' => 'No Telphone Masih Kosong!',
        //     'password.required'  => 'Password Masih Kosong!'
        // ]);

        //parameter inputan ditampung ke dalam varibale
        $noTelp = $request->noTelp;
        $password = $request->password;

        //Check ke database
        $checkUser = DB::table('tbluser')
            ->select('user_id', 'nama_depan', 'no_telp', 'email', 'password')
            ->where('no_telp', $noTelp)
            ->first();

        //validasi hasil query ke database
        if($checkUser) {
            if(Hash::check($password, $checkUser->password)) {
                //Insert data ke dalam session
                // Session::flush();
                Session::put('userId', $checkUser->user_id);
                Session::put('noTelp', $checkUser->no_telp);
                Session::put('email', $checkUser->email);
                Session::put('username', $checkUser->nama_depan);
                Session::put('menuActive', 'home');
                Session::put('login', TRUE);

                return view('home.index');

            } else {
                //insert error value ke dalam session status dan return ke view form login
                return redirect('/')->with('status', 'Password Salah!')->withInput($input);
            }                
        } else {
            //insert error value ke dalam session status dan return ke view form login
            return redirect('/')->with('status', 'No Telphone Salah!')->withInput($input);
        }
    }

    public function Logout() {
        //Clear Session
        session::flush();
        return redirect('/');
    }
}
