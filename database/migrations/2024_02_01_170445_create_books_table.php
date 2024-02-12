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
            $table->string('title', 255);
            $table->longText('sinopsis')->nullable();
            $table->string('state', 1)->default(1);
            $table->string('observations', 500)->nullable();
            $table->text('photo')->nullable();
            $table->bigInteger('editorial_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->timestamps();
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascada');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascada');
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
