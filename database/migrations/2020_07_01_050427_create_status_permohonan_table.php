<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_permohonan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('permohonan_baru_id')->unsigned();
            $table->foreign('permohonan_baru_id')->references('id')->on('permohonan_baru');
            $table->string('tarikh')->nullable();
            $table->string('nama_staff')->nullable();
            $table->string('catatan')->nullable();
            $table->bigInteger('status')->unsigned();
            $table->foreign('status')->references('id')->on('status');
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
        Schema::dropIfExists('status_permohonan');
    }
}
