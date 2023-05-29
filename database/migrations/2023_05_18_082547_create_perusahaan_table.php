<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id('perusahaan_id');
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_pj')->nullable();
            $table->string('bidang')->nullable();
            $table->string('tlp_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('tlp_pj')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
}
