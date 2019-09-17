<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientsToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients_to_courses', function(Blueprint $table)
		{
			$table->foreign('FK_course', 'clients_to_courses_ibfk_1')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('FK_client', 'clients_to_courses_ibfk_2')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients_to_courses', function(Blueprint $table)
		{
			$table->dropForeign('clients_to_courses_ibfk_1');
			$table->dropForeign('clients_to_courses_ibfk_2');
		});
	}

}
