<?php
	
//	use Core\App;
//	use Core\Database;
//	use Core\Validator;
//
//	$db = App::resolve(Database::class);
//
//	$email = $_POST['email'];
//	$password = $_POST['password'];
//
//	$errors = [];
//	if (!Validator::email($email)) {
//		$errors['email'] = 'Please provide a valid email address.';
//	}
//
//	if (!Validator::string($password, 7, 255)) {
//		$errors['password'] = 'Please provide a password of at least seven characters.';
//	}
//
//	if (! empty($errors)) {
//		return view('registration/create.view.php', [
//			'errors' => $errors
//		]);
//	}
//
//	$user = $db->query('select * from users where email = :email', [
//		'email' => $email
//	])->find();
//
//	if ($user) {
//		header('location: /');
//		exit();
//	} else {
//		$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
//			'email' => $email,
//			'password' => $password // NEVER store database passwords in clear text. We'll fix this in the login form episode. :)
//		]);
//
//		$_SESSION['user'] = [
//			'email' => $email
//		];
//
//		header('location: /');
//		exit();
//	}
	
	use Core\App;
	use Core\Database;
	use Core\Validator;
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//validate that the provided email and password
	$errors = [];
	if(! Validator::email($email)){
		$errors['email'] = 'You must provide a valid email.';
	}
	
	if(! Validator::string($password, 7, 255)){
		$errors['password'] = 'You must provide a password between of at least 7 characters.';
	}
	
	if(! empty($errors)){
		return view('registration/create.view.php', [
			'errors' => $errors
		]);
	}
	
	//check if the user already exists
	$db = App::resolve(Database::class);
	$user = $db->query('select * from users where email = :email', [
		'email' => $email
	])->find();
	
	if($user){
		header('location: /');
		exit();
	}else{
		$db->query('INSERT into users (email, password) VALUES(:email, :password)', [
			'email' => $email,
			'password' => $password
		]);
		
		$_SESSION['user'] = [
			'email' => $email
		];
		
		header('location: /');
		exit();
	}
	
	