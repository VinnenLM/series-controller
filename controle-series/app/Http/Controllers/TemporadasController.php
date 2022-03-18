<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function listarTemporadas(Request $request)
    {
        $temporadas = Temporada::all();
        //$mensagem = $request->session()->get('mensagem');
        return view('series/index'); //,compact('series', 'mensagem'));
    }
}
