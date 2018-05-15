<?php

function exception_error_handler($severity, $message, $file, $line)
{
	if (!(error_reporting() & $severity)) {

		echo "Dieser Fehlercode ist nicht in error_reporting enthalten";

		return;
	}

	new ErrorException($message, 0, $severity, $file, $line);
}

/** noch testen **/
//function custom_error_handler($number, $string, $file, $line, $context)
//{
//	// Determine if this error is one of the enabled ones in php config (php.ini, .htaccess, etc)
//	$error_is_enabled = (bool)($number & ini_get('error_reporting') );
//
//	// -- FATAL ERROR
//	// throw an Error Exception, to be handled by whatever Exception handling logic is available in this context
//	if( in_array($number, array(E_USER_ERROR, E_RECOVERABLE_ERROR)) && $error_is_enabled ) {
//		throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
//	}
//
//	// -- NON-FATAL ERROR/WARNING/NOTICE
//	// Log the error if it's enabled, otherwise just ignore it
//	else if( $error_is_enabled ) {
//		error_log( $string, 0 );
//		return false; // Make sure this ends up in $php_errormsg, if appropriate
//	}
//}

set_error_handler("exception_error_handler");
	
function __autoload($className)
{
	if(file_exists('./lib/'.$className.'.php'))
   		require_once ('./lib/'."$className.".'php');
	else if(file_exists('./app/'.$className.'.php'))
		require_once ('./app/'."$className.".'php');
	else
		echo 'Datei nicht vorhanden';
}

/* Php Error als Exception */
strpos();

/*****************************/

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