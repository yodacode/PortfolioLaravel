<?php  
	
	Form::macro('submitCustom', function($txt, $class='btn')
	{
	    return '<input type="submit" value="' . $txt . '" class="' . $class . '" />';
	});