<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('midname')->nullable();
            $table->string('fathername');
            $table->string('mothername');
            $table->string('address');
            $table->date('dob');
            $table->string('email');
            $table->enum('gender',['m','f','o']);
            $table->string('phone');
            $table->string('profile');
            $table->string('verify_document');
            $table->string('search_id')->unique();
            $table->enum('status',['verified','pending'])->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
