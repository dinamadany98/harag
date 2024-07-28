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
        Schema::create('favorats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('saller_id');
            $table->unsignedBigInteger('announcement_id');
            $table->foreign('user_id') 
            ->references('id')
            ->on('users')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreign('saller_id')
            ->references('id')
            ->on('users')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreign('announcement_id')
            ->references('id')
            ->on('announcements')
            ->constrained()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorats');
    }
};
