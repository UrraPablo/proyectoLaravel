<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('posts')){
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('author_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
                $table->string('title');
                $table->text('content');
                $table->boolean('habilitated')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
