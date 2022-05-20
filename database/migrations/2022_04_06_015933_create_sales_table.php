<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('nm_sales')->nullable();
            $table->string('no_hp')->nullable();
            $table->integer('id_produk')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            $table->date('tgl_order')->nullable();
            
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
        Schema::dropIfExists('sales');
    }
}
