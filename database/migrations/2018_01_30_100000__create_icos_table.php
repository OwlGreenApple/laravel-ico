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
			$table->double('rating')->nullable();
			$table->text('about')->nullable();
			$table->text('description')->nullable();
			$table->text('categories')->nullable();
			$table->string('status',50)->nullable();
			$table->string('url_link_video',255)->nullable();
			$table->string('url_link_blog',255)->nullable();
			$table->string('ofc_website',255)->nullable();
			$table->string('price',255)->nullable();
			$table->string('platform',255)->nullable();
			$table->string('country_operation',255)->nullable();
			$table->string('token_ticker',255)->nullable();
			$table->string('restrictions',255)->nullable();
			$table->dateTime('presale_start')->nullable();
			$table->dateTime('presale_end')->nullable();
			$table->dateTime('sale_start')->nullable();
			$table->dateTime('sale_end')->nullable();
			$table->double('token_for_sale')->nullable();
			$table->text('list_exchange')->nullable();
			$table->string('twitter_username',255)->nullable();
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
        Schema::dropIfExists('icos');
    }
}
