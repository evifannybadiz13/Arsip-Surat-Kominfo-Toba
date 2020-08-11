<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_surats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat');
            $table->string('sifat');
            $table->string('lampiran');
            $table->string('perihal');
            $table->string('penerima');
            $table->string('pengirim');
            $table->text('isi');
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
        Schema::dropIfExists('form_surats');
    }
}
