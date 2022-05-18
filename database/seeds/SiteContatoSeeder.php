<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(19) 997705920';
        $contato->email = 'gustavo@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema SG';
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
    }
}
