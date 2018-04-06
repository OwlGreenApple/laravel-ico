<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreRatingToIcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icos', function (Blueprint $table) {
            $table->double('rating_project')->nullable();
            $table->double('rating_profile')->nullable();
            $table->double('rating_team')->nullable();
            $table->double('rating_hype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('icos', function (Blueprint $table) {
            //
        });
    }
}
