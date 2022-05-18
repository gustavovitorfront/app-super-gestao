<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use \App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivosContatos = MotivoContato::all();

        return view('site.contato', [
            'titulo' => 'Contato',
            'motivosContatos' => $motivosContatos
        ]);
    }

    public function salvar(Request $request)
    {

        // validar dados
        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'required|email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'nome.min' => 'O campo nome precisar ter no minimo 3 caracteres',
                'nome.min' => 'O campo nome precisar ter no maximo 40 caracteres',
                'nome.unique' => 'O nome informado já está em uso.',
                'required' => 'O campo :attribute deve ser preenchido.',
                'email' => 'O email deve ser válido.',
                'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
                'motivo_contatos_id.required' => 'O campo motivo deve ser informado.'
            ]
        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
