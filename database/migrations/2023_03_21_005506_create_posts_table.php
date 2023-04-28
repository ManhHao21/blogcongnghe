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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('view_counts')->default(0);
            $table->unsignedBigInteger('users_id');
            $table->boolean('new_post')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('slug');
            $table->unsignedBigInteger('categories_id');
            $table->boolean('highlight_post');
            $table->boolean('slide_post');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('categories_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
