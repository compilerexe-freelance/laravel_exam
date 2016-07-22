<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix');
            $table->string('firstname')->unique();
            $table->string('lastname');
            $table->string('address');
            $table->string('school');
            $table->string('school_class');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('tel')->unique();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('tb_statistic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->integer('level');
            $table->integer('sub_level');
            $table->integer('fail');
            $table->integer('view_exam');
            $table->timestamps();
        });
        Schema::create('tb_id_exam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->integer('sub_level');
            $table->integer('id_exam');
            $table->string('title');
            $table->string('answer_a');
            $table->string('answer_b');
            $table->string('answer_c');
            $table->string('answer_d');
            $table->string('correct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tb_user','tb_exam','tb_statistic');
    }
}
