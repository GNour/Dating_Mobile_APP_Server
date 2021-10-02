<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('gender'); /* 0 for Male, 1 for Female, 2 for other */
            $table->boolean('interested_in'); /* 0: interested in Men, 1: interested in Women, 2:Other */
            $table->date('dob'); /* Date of birth */
            $table->string('height');
            $table->string('weight');
            $table->string('nationality');
            $table->string("city");
            $table->string("country");
            $table->text('bio');
            $table->enum('role', ["Admin", "User"])->default("User");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
