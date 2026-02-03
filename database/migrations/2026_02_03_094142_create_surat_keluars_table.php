<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('tujuan');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->string('file_path')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('status')->default('draft'); // draft, sent
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
