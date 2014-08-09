<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="wrap">
	<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo $this->Html->link('Digisquare', '/', array('class' => 'navbar-brand')); ?>
			</div>
			<nav class="collapse navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<?php $links = ['editions', 'places', 'events', 'organizations', 'tags', 'startups', 'users'] ?>
					<?php foreach ($links as $link): ?>
						<li>
							<?php echo $this->Html->link(ucfirst($link), array(
								'controller' => $link,
								'action' => 'index'
							)); ?>
						</li>						
					<?php endforeach; ?>
				</ul>
				<?php if ($this->Session->check('Auth.User')): ?>
					<p class="navbar-text navbar-right">
						Signed in as <?php echo $this->Session->read('Auth.User.username'); ?>
					</p>
					
					<ul class="nav navbar-nav navbar-right">
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
				          <ul class="dropdown-menu">
				            <li><?php echo $this->Html->link(__('Badges'), array('controller' => 'badges', 'action' => 'index')); ?></li>
				            <li><?php echo $this->Html->link(__('Manage badges'), array('controller' => 'badges', 'action' => 'manage')); ?></li>
						<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
				          </ul>
				        </li>
				     </ul>
				<?php else: ?>
					<ul class="nav navbar-nav navbar-right">
						<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?></li>
					</ul>
				<?php endif; ?>
			</nav>
		</div>
	</header>
	<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<footer id="footer">
		<?php echo $this->element('sql_dump'); ?>
	</footer>
	<?php echo $this->Html->script('http://code.jquery.com/jquery-2.1.0.min.js'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('script'); ?>
	<?php echo $this->fetch('script'); ?>
</body>
</html>
