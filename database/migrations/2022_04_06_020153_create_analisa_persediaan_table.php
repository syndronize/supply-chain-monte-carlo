<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaPersediaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_persediaan', function (Blueprint $table) {
            $table->id('id_analisa');
            $table->integer('id_produk')->nullable();
            $table->date('tgl_prediksi')->nullable();
            $table->string('hasil_analisa')->nullable();
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
        Schema::dropIfExists('analisa_persediaan');
    }
}
