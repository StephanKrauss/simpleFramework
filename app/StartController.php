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

		public function __construct($params)
		{
			$this->params = $params;
		}

		public function start()
		{
			$sparrowDb = new Sparrow();

			$templateEngine = new Template();

			$templateEngine->title = "Variable example";

			$templateEngine->array = array(
				'1' => "First array item",
				'2' => "Second array item",
				'n' => "N-th array item",
			);

			$templateEngine->j = 5;

			$templateEngine
				->setFile('view/index.phtml')
				->setLayout('view/layout.phtml')
				->render();
		}

	}
