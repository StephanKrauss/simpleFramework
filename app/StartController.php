<?php

	/**
	 * Beschreibung der Klasse
	 *
	 * @author User
	 * @date 15.05.2018
	 * @file Start.php
	 * @link Aufruf der Datei
	 */
	class StartController
	{
		protected $params = array();

		public function __construct(array $params)
		{
			$this->params = $params;
		}

		public function start()
		{
			$sparrowDb = new Sparrow();

			$test = 123;
		}

	}
