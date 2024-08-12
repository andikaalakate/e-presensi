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
        Schema::create('siswa_logins', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('siswa_logins');
    }
};
