<?php


	$container = new Container();

	$params = parse_ini_file('../config/config.ini', true);
	$container->addParams('config', $params);
	// $params = $container->getParams('config');

	$container->add('Datenbank', 'Sparrow');
	// $obj = $container->get('Datenbank');

	$container->add('Template', 'Template');
?>