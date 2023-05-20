<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id('layanan_id');
            $table->string('kategori');
            $table->string('layanan');
            $table->string('tipe');
            $table->string('hrg_jual');
            $table->string('hrg_produksi');
            $table->string('hrg_pokok');
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
        Schema::dropIfExists('layanan');
    }
}
