<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->meta('icon'); ?>
	<?php if (Configure::read('debug') < 2) {
		$css_rev_manifest = file_get_contents(WWW_ROOT . 'generated/css/rev-manifest.json');
		$css_version = json_decode($css_rev_manifest, true);
		echo $this->Html->css('/generated/css/' . $css_version['main.min.css']);
	} else {
		echo $this->Html->css('/generated/css/main');
	} ?>
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->fetch('css'); ?>
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
					<?php echo $this->Html->link('Digisquare', '/', ['class' => 'navbar-brand']); ?>
				</div>
				<nav class="collapse navbar-collapse" role="navigation">
					<ul class="nav navbar-nav">
						<?php $item = strtolower(Inflector::singularize($this->name)); ?>
						<?php if (isset($this->viewVars[$item]['Edition'])) {
							$edition['Edition'] = $this->viewVars[$item]['Edition'];
						} else {
							// TODO: detect closest edition
							$edition['Edition'] = [
								'name' => 'Bordeaux',
								'slug' => 'bordeaux'
							];
						} ?>
						<li>
							<?php echo $this->Link->viewEdition(
								'Calendrier',
								$edition
							); ?>
						</li>
						<li>
							<?php echo $this->Link->listEditionEvents(
								'Evènements',
								$edition
							); ?>
						</li>
						<li>
							<?php echo $this->Link->listEditionOrganizations(
								'Annuaire',
								$edition
							); ?>
						</li>
					</ul>
					<?php if ($this->Session->check('Auth.User')): ?>
						<?php if (!empty($this->Session->read('Auth.User.avatar'))) {
							$avatar = $this->Html->image(
								$this->Session->read('Auth.User.avatar'),
								['height' => 20, 'style' => 'border: #f3f3f3 solid 1px; border-radius: 5px;']
							);
						} else {
							$avatar = '<i class="fa fa-link"></i>';
						} ?>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php echo $avatar; ?>
								</a>
								<ul class="dropdown-menu">
									<li>
										<?php echo $this->Link->viewUser($this->Session->read('Auth')); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Logout'),
											['controller' => 'users', 'action' => 'logout']
										); ?>
									</li>
								</ul>
							</li>
						</ul>
					<?php else: ?>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<?php echo $this->Html->link(
									__('Login'),
									['controller' => 'users', 'action' => 'login']
								); ?>
							</li>
						</ul>
					<?php endif; ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $edition['Edition']['name']; ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php
									// TODO: link all editions with events
									echo $this->Link->viewEdition(
										'Montpellier',
										[
											'Edition' => [
												'name' => 'Montpellier',
												'slug' => 'montpellier'
											]
										]
									); ?>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer id="footer">
			Amour & Création
			<?php echo $this->element('sql_dump'); ?>
		</footer>
	</div>
	<?php if (Configure::read('debug') < 2) {
		$js_rev_manifest = file_get_contents(WWW_ROOT . 'generated/js/rev-manifest.json');
		$js_version = json_decode($js_rev_manifest, true);
		echo $this->Html->script('/generated/js/' . $js_version['main.min.js']);
	} else {
		echo $this->Html->script('/generated/js/main');
	} ?>
	<?php echo $this->fetch('script'); ?>
</body>
</html>
