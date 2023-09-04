<?php
	
	use Core\Authenticator;
	use Http\Forms\LoginForm;
	
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$form = new LoginForm();

	if ($form->validate($email, $password)) {
		$auth = new Authenticator();
		
		if ($auth->loginAttempt($email, $password)){
			redirect('/');
		}else{
			$form->addError('email', 'No matching account found for that email address and password.');
		}
	}
	
	
	return view('session/create.view.php', [
		'errors' => $form->errors()
	]);
	
	