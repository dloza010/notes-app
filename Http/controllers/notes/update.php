<?php
	
	use Core\App;
	use Core\Database;
	use Core\Validator;
	
	// find the corresponding note
	$db = App::resolve('Core\Database');
	$currentUserId = 1;
	
	
	// get the note
	$note = $db->query('SELECT * from notes WHERE id = :id', [
		'id' => $_POST['id']
	])->findOrFail();
	
	// authorize that the current user can edit the form
	authorize($note['user_id'] === $currentUserId);
	
	// validate the form
	$errors = [];
	
	if (! Validator::string($_POST['body'], 1, 20)){
		$errors['body'] = 'A body of more than 20 characters is required.';
	}
	
	// if there are validation error, we return the view with the same note
	if (count($errors)) {
		return view('notes/edit.view.php', [
			'heading' => 'Edit Note',
			'errors' => $errors,
			'note' => $note
		]);
	}
	
	// otherwise we update the database
	$db->query('UPDATE notes SET body = :body WHERE id = :id', [
		'body' => $_POST['body'],
		'id' => $_POST['id']
	]);
	
	// redirect the user
	header('location: /notes');
	die();