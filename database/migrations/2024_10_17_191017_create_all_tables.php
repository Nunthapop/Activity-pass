<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Create types table
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45);
            $table->dateTime('datetime');
            $table->string('name', 45);
            $table->string('description', 45);
            $table->timestamps();
        });

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 45);
            $table->string('password', 45);
            $table->string('role', 45);
            $table->timestamps();
        });

        // Create students table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('year', 45);
            $table->string('major', 45);
            $table->string('score', 45);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        // Create activities table
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->dateTime('datetime');
            $table->string('activity_by', 45);
            $table->string('location', 45);
            $table->string('score', 45);
            $table->string('description', 45);
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('reward_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->timestamps();
        });

        // Create rewards table
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45);
            $table->string('score', 45);
            $table->string('description', 45);
            $table->string('rewardscol', 45);
            $table->timestamps();
        });

        // Add foreign key for rewards in activities table
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('reward_id')->references('id')->on('rewards');
        });

        // Create student_activities (pivot) table
        Schema::create('student_activities', function (Blueprint $table) {
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
        // Drop tables in reverse order to avoid foreign key constraints
        Schema::dropIfExists('student_activities');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
        Schema::dropIfExists('types');
    }
}