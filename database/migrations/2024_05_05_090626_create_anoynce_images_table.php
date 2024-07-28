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
        Schema::create('anoynce_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('announce_id');
            $table->foreign('announce_id')
                 ->references('id')
                 ->on('announcements')
                 ->constrained()
                 ->cascadeOnDelete();
            $table->string('image_name');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anoynce_images');
    }
};
