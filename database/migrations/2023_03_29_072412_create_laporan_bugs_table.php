<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use MyCLabs\Enum\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanBug', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['functional_error', 'performance_defects', 'usability_defects','compatibility_error','security_error','syntax_error','logic_error']);
            $table->string('deskripsi', 100);
            $table->date('tgl_kejadian');
            $table->string('pelapor', 100);
            $table->enum('status', ['reported','on progress','solved']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_bug');
    }
};
