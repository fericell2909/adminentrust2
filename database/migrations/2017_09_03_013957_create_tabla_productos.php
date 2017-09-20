<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('cDescripcionProducto',100);
            $table->decimal('precio',10,2);
            $table->timestamps();
        });

        DB::table('productos')->insert([
                            ['cDescripcionProducto' => 'Monitor','precio' => 150.00],
                            ['cDescripcionProducto' => 'Teclado','precio' => 100.00],
                            ['cDescripcionProducto' => 'Cpu','precio' => 1000.00],
                            ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
