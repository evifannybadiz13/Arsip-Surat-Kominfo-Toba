<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_agenda');
            $table->string('nomor_surat');
            $table->date('tgl_surat');
            $table->string('pengirim');
            $table->date('tgl_terima');
            $table->string('perihal');
            $table->string('sifat');
            $table->string('disposisi');
            $table->string('disposisi_kadis');
            $table->string('disposisi_sekdis');
            $table->string('disposisi_kabid');
            $table->string('status_kabid');
            $table->string('status_admin');
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
        Schema::dropIfExists('disposisis');
    }
}
