<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PsikologPiket extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('psikolog_piket', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hari')->nullable();
			$table->integer('shift')->nullable();
			$table->integer('psikolog_id')->unsigned();
			$table->timestamps();

			$table->foreign('psikolog_id')->references('id')->on('psikolog');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('psikolog_piket');
	}

}
