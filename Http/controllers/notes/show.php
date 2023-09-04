<?php
	
	use Core\Database;
	use Core\App;
	
	$db = App::resolve('Core\Database');
	
	$currentUserId = 1;
	
	$query = 'select * from notes where id = :id';
	$note = $db->query($query, [
		'id' => $_GET['id']
	])->findOrFail();
	
	authorize($note['user_id'] === $currentUserId);
	
	view('notes/show.view.php', [
		'heading' => 'Note',
		'note' => $note
	]);
	
	