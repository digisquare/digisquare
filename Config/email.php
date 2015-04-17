<?php

class EmailConfig {

	public $mandrill = [
		'transport' => 'Mandrill.Mandrill',
		'from' => 'bonjour@digisquare.net',
		'fromName' => 'Digisquare',
		'timeout' => 30,
		'api_key' => 'YOUR_API_KEY',
		'emailFormat' => 'both',
	];

	public function __construct() {
		if (isset($_SERVER) && isset($_SERVER['DIGI_MANDRILL_API_KEY'])) {
			$this->mandrill['api_key']  = $_SERVER['DIGI_MANDRILL_API_KEY'];
		}
	}
}
