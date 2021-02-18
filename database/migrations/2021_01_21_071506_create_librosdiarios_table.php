<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosdiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librosdiarios', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            $table->boolean('estado')->default('0');
            $table->unsignedBigInteger('empresaId');
            $table->foreign('empresaId')->references('id')->on('empresas');
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
        Schema::dropIfExists('librosdiarios');
    }
}
