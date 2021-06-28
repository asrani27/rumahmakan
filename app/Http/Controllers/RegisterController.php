<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Kustomer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $req)
    {
        $checkUsername = User::where('username', $req->username)->first();
        if($checkUsername != null){
            toastr()->error('Username sudah di gunakan');
            return back();
        }else{
            $role = Role::where('name','user')->first();
            $d = new User;
            $d->name = $req->name;
            $d->username = $req->username;
            $d->password = bcrypt($req->password);
            $d->save();

            $d->roles()->attach($role);
            
            $k = new Kustomer;
            $k->nama = $req->name;
            $k->user_id = $d->id;
            $k->save();
            toastr()->success('Berhasil Daftar, Silahkan Login');
            return redirect('/');
        }
    }
}
