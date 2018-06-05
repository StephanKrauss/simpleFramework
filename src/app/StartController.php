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
		/** @var $params array  */
		protected $params = array();

		/** @var $container Container  */
		protected $container = null;

		public function __construct($params, $container)
		{
			$this->params = $params;
			$this->container = $container;
		}

		public function start()
		{
			$sparrowDb = $this->container->get('Datenbank');

			$templateEngine = $this->container->get('Template');

			$templateEngine->title = "Variable example";

			$templateEngine->array = array(
				'1' => "First array item",
				'2' => "Second array item",
				'n' => "N-th array item",
			);

			$templateEngine->j = 5;

			$templateEngine
				->setFile('../view/index.phtml')
				->setLayout('../view/layout.phtml')
				->render();
		}

	}
