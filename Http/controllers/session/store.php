<?php
	
	use Core\Authenticator;
	use Http\Forms\LoginForm;
	
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	$form = LoginForm::validate([
		'email' => $email,
		'password' => $password
	]);
	
	$signedIn = (new Authenticator)->loginAttempt($email, $password);
	
	if ($signedIn){
		$form->addError('email', 'No matching account found for that email address and password.')->throw();
	}
	
	redirect('/');
	
	
	
	