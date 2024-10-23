<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('username', 45);
            $table->string('password', 45);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->integer('year');
            $table->string('major', 45);
            $table->string('score', 45);
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->date('date');
            $table->string('detail', 45);
            $table->string('status', 45);
            $table->integer('score');
            $table->timestamps();
        });

        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('score', 45);
            $table->float('qty');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });

        Schema::create('student_has_activity', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->primary(['student_id', 'activity_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_has_activity');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('students');
    }
}