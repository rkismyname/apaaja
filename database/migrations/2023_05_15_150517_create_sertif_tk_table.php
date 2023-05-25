<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertif_tk', function (Blueprint $table) {
            $table->id('tk_id');
            $table->string('ktp');
            $table->string('npwp');
            $table->string('ijazah');
            $table->string('foto_terbaru');
            $table->string('bukti_trf');
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
        Schema::dropIfExists('sertif_tk');
    }
}
