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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->string('title');
            $table->text('content');
            $table->string('post_image');
            $table->timestamp('published_at')->useCurrent();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');  // Add this line for the user_id
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();
        
            $table->foreign('category_id')->references('category_id')->on('categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        
            // Add this foreign key constraint for user_id
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
