<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function registrar()
    {
        return view('registrar/registrar');
    }

    public function criarRegistro(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $user = \App\Models\User::create($data);

        Auth::login($user);

        return redirect('/series');
    }
}
