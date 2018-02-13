<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos',function(Blueprint $table){
            $table->engine='InnoDB';
            $table->increments('id');
            $table->dateTime('fecha_ingreso');   
            $table->string('tipo_comprobante')->nullable();
            $table->string('num_comprobante')->nullable();
            $table->integer('proveedora_id')->unsigned();
            $table->foreign('proveedora_id')->references('id')->on('proveedoras')->onDelete('cascade');
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
        Schema::dropIfExists('ingresos');
    }
}
