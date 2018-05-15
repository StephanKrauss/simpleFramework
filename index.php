<?php

function __autoload($className)
{
	if(file_exists('./lib/'.$className.'.php'))
   		require_once ('./lib/'."$className.".'php');
	else if(file_exists('./app/'.$className.'.php'))
		require_once ('./app/'."$className.".'php');
	else
		echo 'Datei nicht vorhanden';
}

$params = [];

if(!empty($_POST)){
	$params = $_POST;
}

if(!empty($_GET)){
	$params = $_GET;
}

$route = new Route();

$route->add('/', function() use($params) {
	$startController = new StartController($params);
	$startController->start();
});

$route->add('/login/.+', function() use($params) {
	$loginController = new LoginController($params);
	$loginController->login();
});

$route->submit();