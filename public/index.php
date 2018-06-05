<?php

function exception_error_handler($e)
{
	echo 'Message: '.$e->getMessage();

	return false;
}

function custom_error_handler($number, $string, $file, $line, $context)
{
	echo 'Message: '.$string;

	return false;
}

set_error_handler("custom_error_handler");
set_exception_handler("exception_error_handler");
	
function __autoload($className)
{
	if(file_exists('../lib/'.$className.'.php'))
   		require_once ('../lib/'."$className.".'php');
	else if(file_exists('../src/app/'.$className.'.php'))
		require_once ('../src/app/'."$className.".'php');
	else
		echo 'Datei nicht vorhanden ! <br>';
}

include('../src/dependence.php');

/*****************************/

$params = [];

if(!empty($_POST)){
	$params = $_POST;
}

if(!empty($_GET)){
	$params = $_GET;
}

$route = new Route();

$route->add('/', function() use($params, $container)
{
	$startController = new StartController($params, $container);
	$startController->start();
});

$route->add('/login/.+', function() use($params) {
	$loginController = new LoginController($params);
	$loginController->login();
});

$route->submit();