<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cedula')->unique();
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->bigInteger('telefono');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->enum('genero',['Mujer','Hombre']);
            $table->enum('nacionalidad',['Colombiano','Extranjero']);
            $table->enum('estado_civil',['Soltero','Casado','Separado','Viudo']);
            $table->date('fecha_nacimiento');
            $table->enum('rh',['A+','A-','B+','B-','AB+','AB-','O+','O-']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
