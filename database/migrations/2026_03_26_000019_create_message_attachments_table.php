<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Schema;

class CreateMessageAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_attachments', function ($table) {
            $table->id();
            $table->unsignedBigInteger('message_id'); // Foreign key to messages table
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type');
            $table->unsignedInteger('file_size');
            $table->unsignedInteger('width')->nullable();  // For image dimensions
            $table->unsignedInteger('height')->nullable(); // For image dimensions
            $table->unsignedInteger('download_count')->default(0); // Tracks download count
            $table->timestamps();

            $table->foreign('message_id')
                ->references('id')->on('messages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_attachments');
    }
}