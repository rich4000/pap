<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema;\nuse Illuminate\Support\Facades\Schema;

class CreateApplicationModule extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            // Add other fields as necessary
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}