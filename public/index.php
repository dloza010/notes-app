<?php
	const BASE_PATH = __DIR__.'/../';
	require BASE_PATH . 'Core/functions.php';
	
	// it lets us go about importing classes that haven't been explicitly or manually required
	spl_autoload_register(function ($class){
		// $class === Core\Database
		
		$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		require base_path("{$class}.php");
	});
	
	require base_path('bootstrap.php');
	
	//require the router that parses the request and figures out the controller that needs to be loaded
	$router = new \Core\Router();
	$routes = require base_path('routes/routes.php');
	
	$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
	$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
	
	$router->route($uri, $method);
