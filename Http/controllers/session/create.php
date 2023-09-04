<?php
	
	use Core\Session;
	
	$heading = 'Login';
	return view('/session/create.view.php', [
		'heading' => $heading,
		'errors' => Session::get('errors') ?? []
	]);