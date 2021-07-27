<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('teacher_id');
            $table->string('name', 50);
            $table->string('age', 25);
            $table->string('gender', 15);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
