<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function principal()
    {
        $motivosContatos = MotivoContato::all();

        return view('site.principal', [
            'motivoContatos' => $motivosContatos
        ]);
    }
}
