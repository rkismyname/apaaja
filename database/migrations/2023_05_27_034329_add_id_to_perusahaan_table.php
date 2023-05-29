<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->foreignId('id')->after('alamat_perusahaan')->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perusahaan', function (Blueprint $table){
            $table->dropForeign(['id']);
            $table->dropColumn(['id']);
        });
    }
}
