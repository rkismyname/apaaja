<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeroranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perorangan', function (Blueprint $table) {
            $table->id('perorangan_id');
            $table->string('nama_perorangan');
            $table->string('no_telepon')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
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
        Schema::dropIfExists('perorangan');
    }
}
