<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('metas', function (Blueprint $table) {
			$table->increments('id');
			$table->string('table_name',255)->nullable();
			$table->integer('table_id');
			$table->string('meta_name',255)->nullable();
			$table->string('meta_value',255)->nullable();
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
