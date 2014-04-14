<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts_medias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id'); // the id of the bear
			$table->integer('media_id'); // the id of the picnic that this bear is at
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
		Schema::table('posts_medias', function(Blueprint $table)
		{
		Schema::dropIfExists("posts_medias");
		});
	}

}
