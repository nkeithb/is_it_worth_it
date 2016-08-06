<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('amount_spent');
            $table->string('range_type');
            $table->unsignedInteger('user_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_inputs');
    }
}
