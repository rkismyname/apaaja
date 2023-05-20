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
            $table->id('id_individual');
            $table->string('nama_perorangan');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telepon');
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
