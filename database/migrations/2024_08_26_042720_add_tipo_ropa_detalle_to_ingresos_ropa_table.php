<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoRopaDetalleToIngresosRopaTable extends Migration
{
    public function up()
    {
        Schema::table('ingresos_ropa', function (Blueprint $table) {
            $table->string('tipo_ropa_detalle')->after('tipo_ropa');
        });
    }

    public function down()
    {
        Schema::table('ingresos_ropa', function (Blueprint $table) {
            $table->dropColumn('tipo_ropa_detalle');
        });
    }
}

