<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToTableSertifTk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sertif_tk', function (Blueprint $table) {
            $table->foreignId('id')->after('bukti_trf')->constrained('users', 'id');
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
            $table->dropForeign(['id']);
            $table->dropColumn(['id']);
        });
    }
}
