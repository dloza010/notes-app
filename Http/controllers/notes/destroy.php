<?php
	
	use Core\App;
	use Core\Database;
	
//	$config = require base_path('config.php');
//	$db = new Database($config['database']);
	$db = App::resolve('Core\Database');
	
	$currentUserId = 1;
	
	$query = 'select * from notes where id = :id';
	$note = $db->query($query, [
		'id' => $_POST['id']
	])->findOrFail();
	
	authorize($note['user_id'] === $currentUserId);
	
	//form was submitted, delete current note
	$db->query('delete from notes where id = :id', [
		'id' => $_POST['id']
	]);
	
	header('location: /notes');
	exit();
	
	