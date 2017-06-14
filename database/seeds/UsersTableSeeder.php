<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert([
            'usuario' => 'admin',
            'password' => bcrypt('12345'),
            'email'=> 'admin@toyosa.com',
            'nombre'=> 'ADMIN',
            'paterno'=> 'PRINCIPAL',
            'rol'=>'1',
            ]);

        DB::table('users')->insert([
            'usuario' => 'solicitante',
            'password' => bcrypt('12345'),
            'email'=> 'solicitante@toyosa.com',
            'nombre'=> 'solicitante',
            'paterno'=> 'solicitante',
            'rol'=>'2',
            ]);

        DB::table('users')->insert([
            'usuario' => 'resp_solicitudes',
            'password' => bcrypt('12345'),
            'email'=> 'responsable_sol@toyosa.com',
            'nombre'=> 'responsable',
            'paterno'=> 'solicitudes',
            'rol'=>'3',
            ]);

        DB::table('users')->insert([
            'usuario' => 'resp_envios',
            'password' => bcrypt('12345'),
            'email'=> 'resp_envios@toyosa.com',
            'nombre'=> 'responsable',
            'paterno'=> 'de envios',
            'rol'=>'4',
            ]);

        DB::table('users')->insert([
            'usuario' => 'resp_almacen',
            'password' => bcrypt('12345'),
            'email'=> 'resp_almacen@toyosa.com',
            'nombre'=> 'responsable',
            'paterno'=> 'de almacen',
            'rol'=>'5',
            ]);
    }
}
