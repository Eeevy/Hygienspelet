<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Answer', function (Blueprint $table) {
            $table->increments('ID');
            $table->increments('Question_ID');
            $table->string('AA_1');
            $table->string('AA_2');
            $table->string('AA_3');
            $table->string('AA_4');
            $table->string('Correct_answer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Answer');
    }
}
