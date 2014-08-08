<?php
class Contact extends AppModel {
 
	var $name = 'Contact';
 
	var $useTable = false;
 
	var $_schema = array(
		'first_name' => array(
			'type' => 'string',
			'length' => 255
		),
		'last_name' => array(
			'type' => 'string',
			'length' => 255
		),
		'email' => array(
			'type' => 'string',
			'length' => 255
		),
		'message' => array(
			'type' => 'text'
		)
	);
 
	var $validate = array(
		'first_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
		),
		'last_name' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
		),
		'message' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
		)
	);
}
?>