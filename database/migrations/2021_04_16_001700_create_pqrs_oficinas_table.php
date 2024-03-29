<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePqrsOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrs_oficinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('pqrs_oficinas');
    }
}
