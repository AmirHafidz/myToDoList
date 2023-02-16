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
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->foreign('category_id')->on('todo_categories')->references('id')->onDelete('cascade');
            $table->foreign('level_id')->on('todo_levels')->references('id')->onDelete('cascade');
            $table->foreign('status_id')->on('todo_statuses')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('todo_lists');
    }
};
