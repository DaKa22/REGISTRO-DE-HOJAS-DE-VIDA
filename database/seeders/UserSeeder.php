<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        User::insert([
            [
                'cedula' => '1003807452',
                'nombre1' => 'Root',
                'nombre2' => '',
                'apellido1' => 'Admin',
                'apellido2' => '',
                'telefono' => 3112535478,
                'direccion' => 'Calle siempre viva 69-24',
                'email' => 'root@root.com',
                'genero' => 'Hombre',
                'nacionalidad' => 'Colombiano',
                'estado_civil' => 'Soltero',
                'fecha_nacimiento' => '2002-04-16',
                'rh' => 'A+',
                // 'password' => Hash::make('root'),
            ]
        ]);
        User::insert([
            [
                'cedula' => '1003800000',
                'nombre1' => 'Santiago',
                'nombre2' => '',
                'apellido1' => 'Maragua',
                'apellido2' => '',
                'telefono' => 322123331,
                'direccion' => 'Calle 13#21-4',
                'email' => 'santiagom@gmail.com',
                'genero' => 'Hombre',
                'nacionalidad' => 'Colombiano',
                'estado_civil' => 'Soltero',
                'fecha_nacimiento' => '1998-03-22',
                'rh' => 'B+',
                // 'password' => Hash::make(null),
            ]
        ]);
        User::insert([
            [
                'cedula' => '1073647451',
                'nombre1' => 'Felipe',
                'nombre2' => '',
                'apellido1' => 'Duran',
                'apellido2' => '',
                'telefono' => 322123000,
                'direccion' => 'Calle 22#43-1',
                'email' => 'feliped@gmail.com',
                'genero' => 'Hombre',
                'nacionalidad' => 'Colombiano',
                'estado_civil' => 'Separado',
                'fecha_nacimiento' => '1992-08-12',
                'rh' => 'O+',
                // 'password' => Hash::make(null),
            ]
        ]);
        User::insert([
            [
                'cedula' => '1073642875',
                'nombre1' => 'Laura',
                'nombre2' => '',
                'apellido1' => 'Vargas',
                'apellido2' => 'Perdomo',
                'telefono' => 3202541454,
                'direccion' => 'Calle 14#25-86',
                'email' => 'lauravargasperdomo@gmail.com',
                'genero' => 'Mujer',
                'nacionalidad' => 'Colombiano',
                'estado_civil' => 'Casado',
                'fecha_nacimiento' => '2003-06-22',
                'rh' => 'AB+',
                // 'password' => Hash::make(null),
            ]
        ]);

    }
}
