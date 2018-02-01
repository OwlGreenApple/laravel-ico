<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('icos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name',50);
			$table->double('ratings')->nullable();
			$table->text('description')->nullable();
			$table->text('categories')->nullable();
			$table->string('status',50)->nullable();
			$table->string('url_link_video',255)->nullable();
			$table->string('url_link_blog',255)->nullable();
			$table->string('price',255)->nullable();
			$table->text('about')->nullable();
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
        Schema::dropIfExists('password_resets');
    }
}
