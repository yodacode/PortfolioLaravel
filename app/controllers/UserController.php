<?php

class UserController extends BaseController {


	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Show the profile for the given user.
     */
    public function signin() {
    	$this->layout->content = View::make('users.signin');
    }

}