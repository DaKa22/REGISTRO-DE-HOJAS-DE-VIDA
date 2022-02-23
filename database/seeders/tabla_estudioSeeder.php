<?php

namespace Database\Seeders;

use App\Models\tabla_estudio;
use Illuminate\Database\Seeder;

class tabla_estudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tabla_estudio::insert([
            [
                'titulo' => 'Ingeniero DevOps',
                'entidad_educativa' => 'Unknow',
                'fecha_terminacion' => '2020-12-12',
                'users_id' => 1,
            ]
        ]);
        tabla_estudio::insert([
            [
                'titulo' => 'Ingeniero en Desarrollo de Software',
                'entidad_educativa' => 'Nacional',
                'fecha_terminacion' => '2021-12-12',
                'users_id' => 2,
            ]
        ]);
        tabla_estudio::insert([
            [
                'titulo' => 'Ingeniero Electronico',
                'entidad_educativa' => 'Corhuila',
                'fecha_terminacion' => '2018-04-25',
                'users_id' => 3,
            ]
        ]);
        tabla_estudio::insert([
            [
                'titulo' => 'Desarrolladora Senior',
                'entidad_educativa' => 'Universidad Surcolombiana',
                'fecha_terminacion' => '2021-06-06',
                'users_id' => 4,
            ]
        ]);
    }
}
