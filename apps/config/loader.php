<?php

$loader = new \Phalcon\Loader();

/**
  * Load library namespace
  */
$loader->registerNamespaces(array(
	/**
	 * Load SQL server db adapter namespace
	 */
	//'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/lib/Phalcon/Db/Adapter/Pdo',
	//'Phalcon\Db\Dialect' => APP_PATH . '/lib/Phalcon/Db/Dialect',
	//'Phalcon\Db\Result' => APP_PATH . '/lib/Phalcon/Db/Result',

	/**
	 * Load common classes
	 */
	'Idy\Common\Events' => APP_PATH . '/common/events',
	'Idy\Idea' => APP_PATH . '/modules/idea'
));

$loader->register();
