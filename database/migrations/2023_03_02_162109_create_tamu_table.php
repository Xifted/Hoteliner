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
        Schema::create('tamu', function (Blueprint $table) {
            $table->integer('id_tamu')->autoIncrement();
            $table->string('username', 16);
            $table->string('password', 255);
            $table->string('email', 100);
            $table->boolean('verified')->default(false);
            $table->string('nama', 30)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('gender', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp', 15)->nullable();
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
        Schema::dropIfExists('tamu');
    }
};
