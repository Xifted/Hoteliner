<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->integer('id_admin')->autoIncrement();
            $table->string('username', 16);
            $table->string('password', 255);
            $table->string('email', 100);
            $table->string('nama', 30);
            $table->date('tgl_lahir');
            $table->enum('gender', ['Laki - Laki', 'Perempuan']);
            $table->enum('jabatan', ['Admin', 'Resepsionis']);
            $table->date('tgl_diterima');
            $table->text('alamat');
            $table->string('no_telp', 15);
            $table->text('keterangan');
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
        Schema::dropIfExists('admin');
    }
};
