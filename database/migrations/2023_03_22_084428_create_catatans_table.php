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
        Schema::create('catatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi', 50);
            $table->string('suhu', 10);
            $table->string('foto', 225);
            $table->string('lama', 20);
            $table->string('desc', 225);
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
        Schema::dropIfExists('catatan');
    }
};
