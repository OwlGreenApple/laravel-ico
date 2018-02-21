<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('submits', function (Blueprint $table) {
			$table->increments('id');
			$table->string('type_application',255)->nullable();
			$table->string('ico_name',255)->nullable();
			$table->text('categories')->nullable();
			$table->string('ofc_website',255)->nullable();
			$table->text('about')->nullable();
			$table->text('description')->nullable();
			$table->string('sale_date',255)->nullable();
			$table->string('token_ticker',255)->nullable();
			$table->string('link_whitepaper',255)->nullable();
			$table->string('link_bounty',255)->nullable();
			$table->string('platform',255)->nullable();
			$table->string('price',255)->nullable();
			$table->string('restrictions',255)->nullable();
			$table->string('contact_email',255)->nullable();
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
        Schema::dropIfExists('submits');
    }
}
