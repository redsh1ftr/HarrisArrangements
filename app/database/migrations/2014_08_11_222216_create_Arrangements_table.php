<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrangementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Arrangements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->string('casket_type');
			$table->string('age');
			$table->string('shell');
			$table->string('name');
			$table->string('liner');
			$table->string('interior');
			$table->string('material');
			$table->string('manufacturer');
			$table->integer('group');
			$table->text('description');
			$table->integer('price');
			$table->integer('cost');
			$table->text('notes');
			$table->string('panel');
			$table->integer('vault_size');
			$table->string('image_01');
			$table->string('image_02');
			$table->string('image_03');
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
		Schema::drop('Arrangements');
	}

}
