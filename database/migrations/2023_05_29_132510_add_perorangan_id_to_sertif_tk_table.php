<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeroranganIdToSertifTkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sertif_tk', function (Blueprint $table) {
            $table->unsignedBigInteger('perorangan_id')->nullable();
            $table->foreign('perorangan_id')->references('perorangan_id')->on('perorangan');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sertif_tk', function (Blueprint $table) {
            $table->dropForeign(['perorangan_id']);
            $table->dropColumn('perorangan_id');
        });
    }
}
