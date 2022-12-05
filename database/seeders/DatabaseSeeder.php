<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Dias_semanas;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        //     \App\Models\Cabecalho::factory(1)->create();
            \App\Models\User::factory(1)->create();
        //     \App\Models\Escola::factory(1)->create();
        //     $des=User::where('vc_tipoUtilizador','Desenvolvedor')->count();
        //     if(!$des){
        //         User::create( [
        //             'vc_nomeUtilizador' =>"Desenvolvedor",
        //             'vc_primemiroNome' => "Desenvolvedor",
        //             'vc_apelido' => "Desenvolvedor",
        //             'vc_email' =>"desenvolvedor@gmail.com",
        //             'email_verified_at' => now(),
        //             'password' => bcrypt("cdci12345678"), // Çpassword
        //              'vc_telefone'=>"",         
        //              'vc_tipoUtilizador'=>"Desenvolvedor",
        //              'vc_genero'=>"Masculino",
        //             'remember_token' => Str::random(10),
        //         ]);
        //     }

        //      // \App\Models\Aluno::factory(10)->create();
        //     // \App\Models\Candidatura::factory(150)->create();

        //      // DB::table('alunos')->insert([
        //      //     'nome' => Str::random(10)
        //      // ]);
        //    /*  DB::table('candidatos')->insert([
        //           'nome' => Str::random(10)
        //      ]);*/
        //      $dias = Dias_semanas::count();
        //      if($dias == 0)
        //      {
        //         Dias_semanas::create([
        //             'vc_dia'=>'Segunda-Feira',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Terça-Feira',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Quarta-Feira',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Quinta-Feira',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Sexta-Feira',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Sábado',
        //         ]);
        //         Dias_semanas::create([
        //             'vc_dia'=>'Domingo',
        //         ]);
        //      }

        //   $categorias=   Categoria_Quiz::count();
        //   if($categorias == 0)
        //   {
        //     Categoria_Quiz::create([
        //         'categoria'=>'Misto',
        //         'slug'=>'aaaaaaaaaaaaaaaaaaaa'
        //     ]);
        //     Categoria_Quiz::create([
        //         'categoria'=>'Imagem',
        //         'slug'=>'bbbbbbbbbbbbbbbbbbbbbb'
        //     ]);
        //     Categoria_Quiz::create([
        //         'categoria'=>'Interação com usuário',
        //         'slug'=>'cccccccccccccccccc'
        //     ]);
        //   }

    }
}
