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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('nama');
            $table->string('no_hp');
            $table->enum('hubungan', ['Ibu', 'Ayah', 'Saudara', 'Lainnya']);
            $table->timestamps();

            $table->foreign('nisn')
            ->references('nisn')
            ->on('siswas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tuas');
    }
};
