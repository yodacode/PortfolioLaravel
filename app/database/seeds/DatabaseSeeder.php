// app/database/seeds/DatabaseSeeder.php
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// call our class and run our seeds
		$this->call('PortfolioAppSeeder');
		$this->command->info('Portfolio app seeds finished.'); // show information in the command line after everything is run
	}

}

// our own seeder class
// usually this would be its own file
class PortfolioAppSeeder extends Seeder {
	
	public function run() {

		// clear our database ------------------------------------------
		DB::table('posts')->delete();
		DB::table('categories')->delete();
		DB::table('tags')->delete();
		DB::table('posts_tags')->delete();

		// seed our categories table ---------------------
		$webdesign = Category::create(array(
			'title'    => 'webdesign',			
		));
		$development = Category::create(array(
			'title'    => 'development'			
		));
		$this->command->info('Categories seeds finish');

		// seed our posts table -----------------------
		// we'll create three different posts

		$postOne = Post::create(array(
			'title'         => 'titre one',
			'url'         	=> 'http://url-one.jpg',
			'description' 	=> 'Description du projet one',
			'category_id' 	=> $webdesign->id
		));
		$postTwo = Post::create(array(
			'title'         => 'titre two',
			'url'         	=> 'http://url-two.jpg',
			'description' 	=> 'Description du projet two',
			'category_id' 	=> $webdesign->id
		));
		$postThree = Post::create(array(
			'title'         => 'titre three',
			'url'         	=> 'http://url-three.jpg',
			'description' 	=> 'Description du projet three',
			'category_id' 	=> $development->id
		));
		

		$this->command->info('Posts seeds finish');


		// we will create one picnic and apply all bears to this one picnic
		$php = Tag::create(array(
			'title'        => 'php',
		));
		$javascript = Tag::create(array(
			'title'        => 'javascript',
		));
		$mvc = Tag::create(array(
			'title'        => 'mvc',
		));
		$html = Tag::create(array(
			'title'        => 'html',
		));
		
		// link our posts to tags ---------------------
		// for our purposes we'll just add all bears to both tags for our many to many relationship
		$postOne->tags()->attach($php->id);
		$postOne->tags()->attach($javascript->id);

		$postTwo->tags()->attach($php->id);
		$postTwo->tags()->attach($javascript->id);

		$postThree->tags()->attach($php->id);
		$postThree->tags()->attach($javascript->id);

		$this->command->info('Tags seeds finish');


		// we will create one picnic and apply all bears to this one picnic
		$image1 = Media::create(array(
			'name'        	=> 'image1.jpg',
		));

		$image2 = Media::create(array(
			'name'        	=> 'image2.jpg',
		));

		$image3 = Media::create(array(
			'name'        	=> 'image3.jpg',
		));
		
		
		// link our posts to medias ---------------------
		// for our purposes we'll just add all bears to both tags for our many to many relationship
		$postOne->medias()->attach($image1->id);
		$postOne->medias()->attach($image2->id);

		$postTwo->medias()->attach($image3->id);
		$postTwo->medias()->attach($image2->id);

		$postThree->medias()->attach($image2->id);		

		$this->command->info('Medias seeds finish');

	}

}
