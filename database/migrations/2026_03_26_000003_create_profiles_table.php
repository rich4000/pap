<?php

database migrations \\

use Illuminate Database Schema Blueprint;
use Illuminate Database Migrations Migration;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('skills');
            $table->integer('experience_years');
            $table->string('education');
            $table->string('portfolio')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('availability')->default(true);
            $table->decimal('salary_expectations', 10, 2)->nullable();
            $table->integer('trust_score')->default(0);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}