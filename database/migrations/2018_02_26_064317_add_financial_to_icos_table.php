<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinancialToIcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('icos', function (Blueprint $table) {
            $table->text('financial')->nullable();
						$table->string('tagline',255)->nullable();
						$table->string('logo',255)->nullable();
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
