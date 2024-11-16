<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkinAnalysesTable extends Migration
{
    public function up()
    {
        Schema::create('skin_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('skin_type'); // Menyimpan jenis kulit
            $table->json('skin_problems'); // Menggunakan JSON untuk menyimpan beberapa masalah kulit
            $table->dateTime('analysis_date'); // Menyimpan tanggal analisis
            $table->string('image_path')->nullable(); // Menyimpan jalur gambar analisis, nullable jika tidak ada
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('skin_analyses');
    }
}
