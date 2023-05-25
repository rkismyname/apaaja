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
            $table->id('id_company');
            $table->string('nama_perusahaan');
            $table->string('nama_pj');
            $table->string('bidang');
            $table->string('tlp_perusahaan');
            $table->string('email_perusahaan');
            $table->string('tlp_pj');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
}
