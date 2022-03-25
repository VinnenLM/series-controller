<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function registrar()
    {
        return view('registrar/create');
    }

    public function criarRegistro(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return redirect('/series');
    }
}
