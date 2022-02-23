<?php

namespace Database\Seeders;

use App\Models\historial_laboral;
use Illuminate\Database\Seeder;

class historial_laboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        historial_laboral::insert([
            [
                'empresa' => 'Daka Company',
                'cargo' => 'DevOps',
                'fecha_inicio' => '2021-01-01',
                'fecha_terminacion' => '2022-01-01',
                'users_id' => 1,
            ]
        ]);
        historial_laboral::insert([
            [
                'empresa' => 'Silog',
                'cargo' => 'Aux',
                'fecha_inicio' => '2021-05-03',
                'fecha_terminacion' => '2022-01-10',
                'users_id' => 1,
            ]
        ]);
        historial_laboral::insert([
            [
                'empresa' => 'Fics',
                'cargo' => 'Junior Dev',
                'fecha_inicio' => '2021-02-03',
                'fecha_terminacion' => '2022-02-01',
                'users_id' => 1,
            ]
        ]);
        historial_laboral::insert([
            [
                'empresa' => 'Daka Company',
                'cargo' => 'Senior',
                'fecha_inicio' => '2021-01-01',
                'fecha_terminacion' => '2022-01-01',
                'users_id' => 1,
            ]
        ]);
    }
}
