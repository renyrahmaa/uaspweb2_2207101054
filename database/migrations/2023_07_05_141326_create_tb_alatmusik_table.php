<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAlatmusikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_alatmusik', function (Blueprint $table) {
            $table->increments('id_alat');
            $table->string('no_alat');
            $table->string('nama_alat');
            $table->string('merk_alat');
            $table->string('jenis');
            $table->string('harga');
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
        Schema::dropIfExists('tb_alatmusik');
    }
}
