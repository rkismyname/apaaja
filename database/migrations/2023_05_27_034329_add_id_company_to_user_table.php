<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdCompanyToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the new column without foreign key constraint
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_company')->after('alamat')->nullable();
        });

        // Add the foreign key constraint
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_company')->references('id_company')->on('perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign key constraint
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_company']);
        });

        // Drop the added column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('id_company');
        });
    }
}
