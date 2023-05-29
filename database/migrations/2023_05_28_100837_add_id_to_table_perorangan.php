<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToTablePerorangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perorangan', function (Blueprint $table) {
            $table->foreignId('id')->after('alamat')->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perorangan', function (Blueprint $table){
            $table->dropForeign(['id']);
            $table->dropColumn(['id']);
        });
    }
}
