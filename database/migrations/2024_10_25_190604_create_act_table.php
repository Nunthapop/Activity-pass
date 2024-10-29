<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create types table
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45);
            $table->string('name', 45);
            $table->string('description', 45);
            $table->timestamps();
        });

        // Create rewards table first to resolve foreign key dependency
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('code', 45);
            $table->string('name', 45);
            $table->integer('score')->default(0);
            $table->integer('qty')->default(0);
            $table->string('description', 45);
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
            $table->integer('score')->default(0);
            $table->timestamps();
        });

        // Create activities table
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->dateTime('datetime');
            $table->string('activity_by', 45);
            $table->string('location', 45);
            $table->integer('score')->default(0);
            $table->string('description', 45);
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('reward_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('reward_id')->references('id')->on('rewards'); // Should work now
            $table->timestamps();
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
        Schema::dropIfExists('student_activities');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('students');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('types');
    }
};
