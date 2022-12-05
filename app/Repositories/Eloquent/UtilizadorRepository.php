<?php

namespace App\Repositories\Eloquent;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilizadorRepository implements UtilizadorInterface
// interface UtilizadorRepository extends UtilizadorInterface

{

    // use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     * @param mixed $id
     */

    // public function get( $id ) {

    // }

    // public function get( $id ) {

    // }

    public function store(array $input)
    {

        return DB::transaction(function () use ($input) {
            return tap(

                User::create([
                    'vc_nomeUtilizador' => $input['vc_nomeUtilizador'],
                    'vc_email' => $input['vc_email'],
                    'vc_tipoUtilizador' => $input['vc_tipoUtilizador'],
                    'vc_telefone' => isset($input['vc_telefone']) ? $input['vc_telefone'] : null,
                    'vc_primemiroNome' => isset($input['vc_primemiroNome']) ? $input['vc_primemiroNome'] : null,
                    'vc_apelido' => isset($input['vc_apelido']) ? $input['vc_apelido'] : null,
                    'vc_genero' => isset($input['vc_genero']) ? $input['vc_genero'] : null,
                    'vc_nome_meio' => isset($input['vc_nome_meio']) ? $input['vc_nome_meio'] : null,
                    'vc_BI' => isset($input['vc_BI']) ? $input['vc_BI'] : null,
                    'dt_data_nascimento' => isset($input['dt_data_nascimento']) ? $input['dt_data_nascimento'] : null,
                    'it_num_agente' => isset($input['it_num_agente']) ? $input['it_num_agente'] : null,
                    'password' => Hash::make($input['password']),
                    'profile_photo_path' => isset($input['profile_photo_path']) ? $input['profile_photo_path'] : null,
                    'slug' => slug_gerar()
                ]),
                function (User $user) {

                    return $this->createTeam($user);
                }
            );
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->vc_nome, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }

    public function update(array $input, $id)
    {

        //        $input = $input[0];

        User::find($id)->update([
            'vc_nomeUtilizador' => $input['vc_nomeUtilizador'],
            'vc_email' => $input['vc_email'],
         
            'vc_telefone' => isset($input['vc_telefone']) ? $input['vc_telefone'] : null,
            'vc_primemiroNome' => isset($input['vc_primemiroNome']) ? $input['vc_primemiroNome'] : null,
            'vc_apelido' => isset($input['vc_apelido']) ? $input['vc_apelido'] : null,
            'vc_genero' => isset($input['vc_genero']) ? $input['vc_genero'] : null,
            'vc_nome_meio' => isset($input['vc_nome_meio']) ? $input['vc_nome_meio'] : null,
            'vc_BI' => isset($input['vc_BI']) ? $input['vc_BI'] : null,
            'dt_data_nascimento' => isset($input['dt_data_nascimento']) ? $input['dt_data_nascimento'] : null,
            'it_num_agente' => isset($input['it_num_agente']) ? $input['it_num_agente'] : null,
            // 'password' => Hash::make($input['password']),

        ]);

        // if ($input['profile_photo_path'] != 'userPhoto/userPadrao.jpg') {
        //     User::find($id)->update([
        //         'profile_photo_path' => $input['profile_photo_path'],
        //     ]);
        // }
    }
    public function update_senha(array $input, $id)
    {

        //        $input = $input[0];

        User::find($id)->update([

            'password' => Hash::make($input['nova_passe']),

        ]);
    }
}
