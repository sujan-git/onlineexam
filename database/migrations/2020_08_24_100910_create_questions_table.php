<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('question');
            $table->string('optA')->nullable();
            $table->string('optB')->nullable();
            $table->string('optC')->nullable();
            $table->string('optD')->nullable();
            $table->string('answer');
            $table->integer('added_by')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
