<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisparadorIngresoStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(' 
                CREATE TRIGGER tr_updStockIngreso AFTER INSERT ON detalle_ingresos
                FOR EACH ROW BEGIN
                    UPDATE productos SET stock=stock+ NEW.cantidad
                    WHERE productos.id = NEW.producto_id;
                    END
                ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    DB::unprepared('DROP TRIGGER `tr_updStockIngreso` ');
    }
}
