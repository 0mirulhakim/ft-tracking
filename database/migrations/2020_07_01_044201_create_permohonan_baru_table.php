<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_baru', function (Blueprint $table) {
            $table->id();
            $table->string('no_fail')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('no_rujukan')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_pa')->nullable();
            $table->string('no_lot')->nullable();
            $table->bigInteger('mukim_id')->unsigned();
            $table->foreign('mukim_id')->references('id')->on('mukim');;
            $table->string('catatan')->nullable();
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');;
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
        Schema::dropIfExists('permohonan_baru');
    }
}
