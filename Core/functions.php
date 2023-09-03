<?php
	
	use Core\Response;
	
	function dd($value){
		echo "<pre>";
		var_dump($value);
		echo "</pre>";
		
		die();
	}
	
	function urlIs($value): bool
	{
		return $_SERVER['REQUEST_URI'] === $value;
	}
	
	function abort($code = 404)
	{
		http_response_code($code);
		require base_path("views/$code.php");
		die();
		
	}
	function authorize($condition, $status = Response::FORBIDDEN){
		if (! $condition){
			abort($status);
		}
	}
	
	function base_path($path): string
	{
		return BASE_PATH . $path;
	}
	
	function view($path, $attributes = []): string
	{
		extract($attributes);
		return require base_path('views/'.$path);
	}
	
	function login($user)
	{
		$_SESSION['user'] = [
			'email' => $user['email']
		];
		
		session_regenerate_id(true);
	}
	
	function logout()
	{
		// log the user out
		//clear out the super global
		$_SESSION = [];
		//destroy session file
		session_destroy();
		
		//clearing the cookies
		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}