<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'digisquare',
		'encoding' => 'utf8'
	);

	public function __construct() {
		if (isset($_SERVER) && isset($_SERVER['DB_HOST'])) {
			$this->default  = array(
				'datasource' => 'Database/Mysql',
				'persistent' => false,
				'host' => $_SERVER['DB_HOST'],
				'login' => $_SERVER['DB_USER'],
				'password' => $_SERVER['DB_PASS'],
				'database' => $_SERVER['DB_NAME'],
				'encoding' => 'utf8'
			);
		}
	}
}
