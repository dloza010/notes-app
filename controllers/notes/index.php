<?php
	use Core\Database;
	use Core\App;
	
	$db = App::resolve('Core\Database');
	
	$query = 'select * from notes where user_id = 1';
	$notes = $db->query($query)->get();
	
	
	view('notes/index.view.php', [
		'heading' => 'My Notes',
		'notes' => $notes
	]);