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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            // $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            // $table->string('category');
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('rating')->default(0);
            $table->string('instructor_name');
            $table->integer('lessons_count')->nullable();
            $table->integer('hours_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
