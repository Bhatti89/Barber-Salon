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
        Schema::create('student6_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('name',35);
            $table->string('registration_no',14);
            $table->string('email',50);
            $table->string('gender',7);
            $table->string('dob',15);

            // $table->unsignedbiginteger('department_id');

            // $table->foreign('department_id')->references('id')->on('departments')
            // ->onDelete('cascade');

            $table->unsignedbiginteger('city_id');

           $table->foreign('city_id')->references('id')->on('cities')
           ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student6_a_s');
    }
};
