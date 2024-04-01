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
        Schema::create('bookmodels', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('author',40);
            $table->string('publisher',40);
            $table->string('year_of_publisher',40);
            $table->string('Number_of_pages',2000);
            $table->string('language',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmodels');
    }
};
