
<h1>Formulaire de contact</h1>
 
<?php echo $this->Form->create('Contact', array('url' => '/contacts/index')); ?>
 
<fieldset>
	<legend>Vos coordonnées</legend>
	<?php
	echo $this->Form->input('nom', array('label' => "Votre nom :", 'size' => 80));
	echo $this->Form->input('prenom', array('label' => "Votre prénom :", 'size' => 80));
	echo $this->Form->input('email', array('label' => "Votre adresse email :", 'size' => 80));
	?>
</fieldset>
 
<fieldset>
	<legend>Votre message</legend>
	<?php echo $this->Form->textarea('message', array('cols' => 60, 'rows' => 12)); ?> 
	<?php echo $this->Form->error('message'); ?> 
</fieldset>
 
<?php echo $this->Form->end("Envoyer le message"); ?>