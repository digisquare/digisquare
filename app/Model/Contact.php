<?php
// {app}/models/contact.php
class Contact extends AppModel {
 
	var $name = 'Contact';
 
	// Nous n'utiliserons pas de table dans la base
	var $useTable = false;
 
	// Nous donnons donc à Cake la structure d'un enregistrement
	var $_schema = array(
		'prenom' => array(
			'type' => 'string',
			'length' => 30
		),
		'nom' => array(
			'type' => 'string',
			'length' => 30
		),
		'email' => array(
			'type' => 'string',
			'length' => 50
		),
		'message' => array(
			'type' => 'text'
		)
	);
 
	// Règles de validation des données
	var $validate = array(
		'nom' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Votre nom doit être renseigné."
		),
		'prenom' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Votre prénom doit être renseigné."
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Vous devez saisir une adresse email valide."
		),
		'message' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Vous devez saisir un message."
		)
	);
}
?>