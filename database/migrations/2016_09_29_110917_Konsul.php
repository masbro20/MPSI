<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Konsul extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('konsul', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('psikolog_piket_id')->unsigned();
            $table->string('path_img');
            $table->string('nomor_antrian');
            $table->integer('biaya_id')->unsigned();
            $table->integer('rekening_id')->unsigned();
            $table->integer('bank_user_id')->unsigned();
            $table->integer('jumlah_transfer');
            $table->timestamps();

            $table->foreign('psikolog_piket_id')
                ->references('id')->on('psikolog_piket');
            $table->foreign('users_id')
                ->references('id')->on('users');
            $table->foreign('rekening_id')
                ->references('id')->on('rekening');
            $table->foreign('bank_user_id')
                ->references('id')->on('bank_user');
            $table->foreign('biaya_id')
                ->references('id')->on('biaya');
        }); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('konsul');
	}

}
