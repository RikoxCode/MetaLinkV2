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
        Schema::create('sheetmusics', function (Blueprint $table) {
            $table->id();
            $table->integer('archive_id')->default(0);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('composer');
            $table->string('arranger');
            $table->string('publisher');
            $table->string('style');
            $table->integer('grad')->default(0);
            $table->integer('flex')->default(0);
            $table->time('duration')->default('00:00:00');
            $table->boolean('is_digital')->default(false);
            $table->string('demo_url')->nullable();
            $table->decimal('price', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheetmusics');
    }
};
