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
        Schema::create('sheet_music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('composer');
            $table->string('instrument');
            $table->string('key');
            $table->string('time_signature');
            $table->string('tempo');
            $table->string('difficulty');
            $table->string('file_path');
            $table->string('image_path');
            $table->string('description');
            $table->string('tags');
            $table->string('status');
            $table->string('visibility');
            $table->string('license');
            $table->string('price');
            $table->string('currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheet_music');
    }
};
