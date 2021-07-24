<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('instansi')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('kode_kategori')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('ip')->nullable();
            $table->string('status')->nullable();
            $table->string('hubungan_keluarga')->nullable();
            $table->string('email')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('faskes')->nullable();
            $table->string('lokasi_vaksin')->nullable();
            $table->string('customer_journey')->nullable();
            $table->string('bagian')->nullable();
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
        Schema::dropIfExists('peserta');
    }
}
