<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //nombre
            $table->index('name');
            $table->string('departament'); //departamento
            $table->string('location'); //localidad
            $table->string('municipality'); //municipio
            $table->integer('active_years'); //años activo
            $table->string('person_type'); //tipo de persona
            $table->string('type_job'); //tipo de cargo
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
        Schema::dropIfExists('dictionary');
    }
}
