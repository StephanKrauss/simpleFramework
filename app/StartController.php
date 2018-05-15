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

			$templateEngine = new Template();

			$template->title = "Variable example";

			$template->array = array(
				'1' => "First array item",
				'2' => "Second array item",
				'n' => "N-th array item",
			);

			$template->j = 5;

			$template
				->setFile('index.phtml')
				->setLayout('@layout.phtml')
				->render();

			$test = 123;
		}

	}
