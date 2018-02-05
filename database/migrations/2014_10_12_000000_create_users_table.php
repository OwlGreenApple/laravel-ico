<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email',255);
            $table->string('password',255);
						$table->boolean('is_confirm_email')->nullable();
            $table->string('fullname',255);
						$table->boolean('gender')->nullable();
						$table->boolean('is_admin')->nullable();
            $table->rememberToken();
            $table->timestamps();
						$table->datetime('last_seen')->nullable();
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
