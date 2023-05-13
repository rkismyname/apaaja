<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('sertifikat', function (Blueprint $table) {
        $table->id();
        $table->string('nama_sertifikat');
        $table->string('nomor_sertifikat')->unique();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sertifikat');
    }
}
