<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
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
							<?php echo $this->Link->listOrganizations(
								'Annuaire',
								$edition
							); ?>
						</li>
					</ul>
					<?php if ($this->Session->check('Auth.User')): ?>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<?php echo $this->Html->link(
									__('Logout'),
									['controller' => 'users', 'action' => 'logout']
								); ?>
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
	</div>
	<footer id="footer">
		<?php echo $this->element('sql_dump'); ?>
	</footer>
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
