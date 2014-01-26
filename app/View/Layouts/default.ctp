<?php $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div style="float:right;">
				<?php if ($this->Session->check('Auth.User')): ?>
					Hello, <?php echo $this->Session->read('Auth.User.username'); ?> | 
					<?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
				<?php else: ?>
					<?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?>
				<?php endif; ?>
			</div>
			<h1><?php echo $this->Html->link('Digisquare', '/'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
