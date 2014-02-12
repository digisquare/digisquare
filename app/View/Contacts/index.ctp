// {app}/views/contacts/index.ctp
<h1>Formulaire de contact</h1>
 
<?php e($form->create('Contact', array('url' => '/contacts/index'))); ?>
 
<fieldset>
	<legend>Vos coordonnées</legend>
	<?php
	e($form->input('nom', array('label' => "Votre nom :", 'size' => 80)));
	e($form->input('prenom', array('label' => "Votre prénom :", 'size' => 80)));
	e($form->input('email', array('label' => "Votre adresse email :", 'size' => 80)));
	?>
</fieldset>
 
<fieldset>
	<legend>Votre message</legend>
	<?php e($form->textarea('message', array('cols' => 60, 'rows' => 12))); ?> 
	<?php e($form->error('message')); ?> 
</fieldset>
 
<?php e($form->end("Envoyer le message")); ?>