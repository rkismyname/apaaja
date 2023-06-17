<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifBuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertif_bu', function (Blueprint $table) {
            $table->id('bu_id');
            $table->string('nib');
            $table->string('npwp_bu');
            $table->string('akte_pend');
            $table->string('akte_peru');
            $table->string('ktp');
            $table->string('npwp_dir');
            $table->string('bukti_trf');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sertif_bu');
    }
}
