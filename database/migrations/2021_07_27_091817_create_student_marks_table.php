<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedDecimal('maths', 9, 2);
            $table->unsignedDecimal('science', 9, 2);
            $table->unsignedDecimal('history', 9, 2);
            $table->unsignedTinyInteger('term')->comment('1- One, 2-Two');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_marks');
    }
}
