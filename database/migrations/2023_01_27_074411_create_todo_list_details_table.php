<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todo_id');
            $table->string('name');
            $table->text('description_one')->nullable();
            $table->string('description_two')->nullable();
            $table->date('date_started')->nullable();
            $table->date('date_end')->nullable();
            $table->time('time_start', 0);
            $table->time('time_end', 0);
            $table->foreign('todo_id')->on('todo_lists')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_list_details');
    }
};
