<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php if (Configure::read('debug') < 2) {
		$css_rev_manifest = file_get_contents(WWW_ROOT . 'generated/css/rev-manifest.json');
		$css_version = json_decode($css_rev_manifest, true);
		echo $this->Html->css('/generated/css/' . $css_version['main.min.css']);
	} else {
		echo $this->Html->css('/generated/css/main');
	} ?>
	<?php if (isset($description_for_layout)) {
		$description_for_layout = $this->Text->truncate(strip_tags($description_for_layout), 160);
		$this->set(compact('description_for_layout'));
		echo $this->Html->meta('description', $description_for_layout);
	} ?>
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->element('opengraph'); ?>
	<?php echo $this->fetch('css'); ?>
	<?php echo $this->element('favicon'); ?>
	<?php echo $this->element('analytics'); ?>
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
						<li>
							<?php echo $this->Link->listEditionVenues(
								'Carte',
								$edition
							); ?>
						</li>
						<?php if (1 == $this->Session->read('Auth.User.group_id')): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Admin <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<?php echo $this->Html->link(
											__('Add Event'),
											[
												'controller' => 'events',
												'action' => 'add'
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Import Event'),
											[
												'controller' => 'events',
												'action' => 'import'
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Upload Event'),
											[
												'controller' => 'events',
												'action' => 'upload'
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Import from GoogleCal'),
											[
												'controller' => 'google_calendar_events',
												'action' => 'index'
											]
										); ?>
									</li>
									<li class="divider"></li>
									<li>
										<?php echo $this->Html->link(
											__('Add Organization'),
											[
												'controller' => 'organizations',
												'action' => 'add'
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Import Organization'),
											[
												'controller' => 'organizations',
												'action' => 'import'
											]
										); ?>
									</li>
									<li class="divider"></li>
									<li>
										<?php echo $this->Html->link(
											__('Admin Venues'),
											[
												'admin' => true,
												'controller' => 'venues',
												'action' => 'index',
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Add Venue'),
											[
												'controller' => 'venues',
												'action' => 'add'
											]
										); ?>
									</li>
									<li>
										<?php echo $this->Html->link(
											__('Merge Venues'),
											[
												'admin' => true,
												'controller' => 'venues',
												'action' => 'merge'
											]
										); ?>
									</li>
								</ul>
							</li>
						<?php endif; ?>
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
												'action' => 'edit'
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
												<?php echo $this->Form->postLink(
													__('Delete'),
													['action' => 'delete', 'id' => $id],
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
								<?php $editions = [
									'Clermont-Ferrand' => 'clermont-ferrand',
									'Bordeaux' => 'bordeaux',
									'Montpellier' => 'montpellier',
									'Toulouse' => 'toulouse',
								]; ?>
								<?php foreach ($editions as $name => $slug): ?>
									<li>
										<?php echo $this->Link->viewEdition(
											[
												'Edition' => [
													'name' => $name,
													'slug' => $slug
												]
											]
										); ?>
									</li>
								<?php endforeach; ?>
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
			<?php echo $this->Html->link(
				'<i class="fa fa-heart"></i> A Propos',
				['controller' => 'pages', 'action' => 'display', 'thanks'],
				['escape' => false]
			); ?> • 
			<?php echo $this->Html->link(
				'<i class="fa fa-twitter"></i> Twitter',
				'https://twitter.com/digisquare_bx',
				['escape' => false]
			); ?> • 
			<?php echo $this->Html->link(
				'<i class="fa fa-github-alt"></i> Github',
				'https://github.com/digisquare/digisquare',
				['escape' => false]
			); ?> •
			<?php echo $this->Html->link(
				'<i class="fa fa-copyright"></i> Mentions Légales',
				['controller' => 'pages', 'action' => 'display', 'legal'],
				['escape' => false]
			); ?>
			<a href="https://play.google.com/store/apps/details?id=net.digisquare.app"><img alt='Disponible sur Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/fr_badge_web_generic.png' height="50" style="margin-top:-13px"/></a>
			<a href="https://itunes.apple.com/fr/app/digisquare/id1129249292"><img alt="Télécharger dans l'App Store" src="https://devimages.apple.com.edgekey.net/app-store/marketing/guidelines/images/badge-download-on-the-app-store-fr.svg" height="34" style="margin-top:-13px" /></a>
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
