<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Training extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->date('tgl');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('tempat');
            $table->text('deskripsi')->nullable();
            $table->integer('kuota')->nullable();
            $table->integer('biaya')->nullable();
            $table->text('note')->nullable();
            $table->text('penyelenggara')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('tipe');
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')->on('users');
	});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('training');
	}

}
