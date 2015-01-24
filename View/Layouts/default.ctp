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
	<?php echo $this->element('favicon'); ?>
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
						<?php $entity = strtolower(Inflector::singularize($this->name)); ?>
						<?php $edition['Edition'] = $this->Session->read('Edition'); ?>
						<li>
							<?php echo $this->Link->viewEdition(
								'Calendrier',
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
										<?php echo $this->Link->viewUser(
											__('My profile'),
											$this->Session->read('Auth')
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Edit my profile'),
											[
												'controller' => 'users',
												'action' => 'edit',
												'id' => $this->Session->read('Auth.User.id')
											]
										); ?>
									</li>
									<li class="divider"></li>
									<?php if (1 == $this->Session->read('Auth.User.group_id')): ?>
										<li>
											<?php echo $this->Html->link(
												__('Add'),
												['action' => 'add']
											); ?>
										</li>
										<?php if ('view' === $this->action && isset($id)): ?>
											<li>
												<?php echo $this->Html->link(
													__('Edit'),
													['action' => 'edit', 'id' => $id]
												); ?>
											</li>
											<li>
												<?php echo $this->Html->link(
													__('Delete'),
													['action' => 'edit', 'id' => $id],
													null,
													__('Are you sure you want to delete this?')
												); ?>
											</li>
										<?php endif; ?>
										<li class="divider"></li>
									<?php endif; ?>
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
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Login'); ?>
								</a>
								<?php $providers = array('facebook', 'twitter', 'google'); ?>
								<ul class="dropdown-menu">
									<?php foreach ($providers as $provider): ?>
										<li>
											<?php echo $this->Html->link(
												ucfirst($provider),
												array(
													'plugin' => 'Opauth',
													'controller' => 'opauth',
													'action' => 'index',
													$provider
												)
											); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						</ul>
					<?php endif; ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $edition['Edition']['name']; ?>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php
									// TODO: link all editions with events
									if ('bordeaux' === $edition['Edition']['slug']): ?>
										<a href="http://montpellier.digisquare.net">Montpellier</a>
									<?php else: ?>
										<?php echo $this->Link->viewEdition(
											'Bordeaux',
											[
												'Edition' => [
													'name' => 'Bordeaux',
													'slug' => 'bordeaux'
												]
											]
										); ?>
									<?php endif; ?>
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
