<?php 
	class User extends Eloquent {

    	protected $table = 'users';

    	$user = User::find(1);

		var_dump($user->email);

	}
 ?>