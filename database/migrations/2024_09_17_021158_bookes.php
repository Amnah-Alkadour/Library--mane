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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId'); 
            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->date('history');
            $table->string('number_page');
            $table->double('price');
            $table->string('language');
            $table->string('state')->default('true');
            $table->longText('image');
            $table->timestamps();
        
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
