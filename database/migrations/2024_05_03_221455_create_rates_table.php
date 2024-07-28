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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saller_id');
            $table->unsignedBigInteger('pucher_id');
            $table->unsignedBigInteger('announcement_id');
            $table->integer('rate');
            $table->foreign('saller_id') 
            ->references('id')
            ->on('users')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreign('pucher_id')
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
        Schema::dropIfExists('rates');
    }
};
