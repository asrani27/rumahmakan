<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            return redirect('/home');
        }else{
            toastr()->error('Username / Password Tidak Ditemukan');
            return back();
        }
    }

    public function storeRegister(Request $req)
    {
        $check = User::where('username', $req->username)->first();
        if($check != null){
            toastr()->error('Username Sudah Di Gunakan, silahkan gunakan yang lain');
            return back();
        }else{
            
        DB::beginTransaction();

        
            try {
                $attr=$req->all();
                $attr['password'] = bcrypt($req->password);

                $role = Role::where('name', 'pembeli')->first();
                
                $u = User::create($attr);
                $u->roles()->attach($role);
                toastr()->success('Berhasil daftar, silahkan masuk dengan user dan pass yang di daftarkan');
                DB::commit(); 
                return redirect('/pesansekarang');
            
            } catch (\Exception $e) {
                
                DB::rollback();
                toastr()->error('Sistem Error');
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }
}
