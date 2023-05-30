<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLayananIdToPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->foreign('layanan_id')->references('layanan_id')->on('layanan');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return voi
     */
    public function down()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->dropForeign(['layanan_id']);
            $table->dropColumn('layanan_id');
        });
    }
}
