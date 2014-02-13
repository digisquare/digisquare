<?php
class ContactsController extends AppController
{
	var $name = 'Contacts';
 
	var $components = array('Email');
 
	function index()
	{
		if(!empty($this->data))
		{
			$this->Contact->create($this->data);
 
			if(!$this->Contact->validates())
			{
				$this->Session->setFlash("Veuillez corriger les erreurs mentionnées.", 'message_notice');
				$this->validateErrors($this->Contact);
			}
			else 
			{
		        	// Nettoyage de la saisie
				App::uses('Sanitize','Utility');
				$this->data = Sanitize::clean($this->data);
 
				$this->set('data', $this->data);
 
				$this->Email->charset  = 'ISO-8859-1';
				$this->Email->to       = 'david.etancelin@y-nov.com';
				$this->Email->bcc      = array($this->data['Contact']['email']);
				$this->Email->from     = $this->data['Contact']['email'];
				$this->Email->sendAs   = 'both';
				$this->Email->subject  = "Formulaire de contact";
				$this->Email->template = 'contact';
 
				// Envoi de l'email
				$this->Email->send();
 
				$this->redirect(array('action' => 'confirmation'));
			}
		}
	}
 
	// Page de remerciement
	function confirmation() {}
}
?>