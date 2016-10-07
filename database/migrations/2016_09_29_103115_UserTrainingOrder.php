<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTrainingOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_training_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('training_id')->unsigned();
            $table->string('path_img');
            $table->string('nomor_antrian');
            $table->integer('biaya_id')->unsigned();
            $table->integer('rekening_id')->unsigned();
            $table->integer('bank_user_id')->unsigned();
            $table->integer('jumlah_transfer');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('training_id')
                ->references('id')->on('training');
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
		Schema::drop('user_training_order');
	}

}
