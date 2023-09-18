<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shortlink', function (Blueprint $table) {
            $table->increments('id_shortlink');

            $table->string('url_shortlink');
            $table->string('url_original');
            $table->string('photo');
            $table->enum('jenis', ['form', 'sertifikat', 'laporan', 'multiplelink', 'zoom', 'leaflet', 'lainnya'])->default('lainnya');
            $table->string('id_users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlink');
    }
};
