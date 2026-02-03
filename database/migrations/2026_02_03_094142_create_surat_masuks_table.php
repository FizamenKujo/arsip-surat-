<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('pengirim'); // Instansi
            $table->string('perihal');
            $table->date('tanggal_terima');
            $table->string('file_path')->nullable();
            $table->foreignId('user_id')->constrained('users'); // Diinput oleh
            $table->string('status')->default('unread'); // unread, read, disposition
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
