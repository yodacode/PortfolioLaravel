<?php 
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
	class User extends Eloquent  implements UserInterface, RemindableInterface {

    	protected $table = 'users';

    	public static $rules = array(
		    'firstname'=>'required|alpha|min:2',
		    'lastname'=>'required|alpha|min:2',
		    'email'=>'required|email|unique:users',
		    'password'=>'required|alpha_num|between:6,12|confirmed',
		    'password_confirmation'=>'required|alpha_num|between:6,12'
	 	);

	 	public function getAuthIdentifier() {
			return $this->getKey();
		}

		public function getAuthPassword() {
			return $this->password;
		}

		public function getReminderEmail() {
			return $this->email;
		}

	}
 ?>