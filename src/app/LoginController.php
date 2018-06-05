<?php

	/**
	 * Beschreibung der Klasse
	 *
	 * @author User
	 * @date 15.05.2018
	 * @file LoginController.php
	 * @link Aufruf der Datei
	 */
	class LoginController
	{
		protected $params = array();

		public function __construct(array $params)
		{
			$this->params = $params;
		}

		public function login(){
			$test = 123;
		}
	}
