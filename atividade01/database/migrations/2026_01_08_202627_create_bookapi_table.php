<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookapi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('category');
            $table->string('publisher');
            $table->integer('published_year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookapi');
    }
};
