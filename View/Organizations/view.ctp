<div role="main">
	<div class="page-header">
		<h1><?php echo h($organization['Organization']['name']); ?></h1>
		<?php $title_for_layout = $organization['Organization']['name']; ?>
		<?php $this->set(compact('title_for_layout')); ?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="media panel-body">
					<?php if (!(empty($organization['Organization']['avatar']))): ?>
						<?php echo $this->Html->meta(
							['property' => 'og:image', 'content' => $organization['Organization']['avatar']],
							null,
							['inline' => false]
						); ?>
						<div class="media-left">
							<?php echo $this->Html->image(
								$organization['Organization']['avatar'],
								['width' => '150']
							); ?>
						</div>
					<?php endif; ?>
					<div class="media-body">
						<?php echo nl2br($this->Text->autoLink($organization['Organization']['description'])); ?>
						<?php $description_for_layout = $organization['Organization']['description']; ?>
						<?php $this->set(compact('description_for_layout')); ?>
					</div>
				</div>
				<div class="panel-footer">
					<?php foreach ($organization['Organization']['Contacts'] as $contact => $url): ?>
						<?php if (!empty($url)): ?>
							<?php $contact = ('website' == $contact ? 'link' : $contact); ?>
							<?php $contact = ('societe' == $contact ? 'info-circle' : $contact); ?>
							<?php $url = ('twitter' == $contact ? 'https://twitter.com/' . $url : $url); ?>
							<?php $url = ('facebook' == $contact ? 'https://www.facebook.com/' . $url : $url); ?>
							<?php echo $this->Html->link(
								'<span class="fa-stack fa-lg bc-color-' . $contact . '">
									<i class="fa fa-square fa-stack-2x"></i>
									<i class="fa fa-' . $contact . ' fa-stack-1x fa-inverse"></i>
								</span>',
								$url,
								['target' => '_blank', 'escape' => false, 'title' => 'Source']
							); ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if ((int) $organization['Organization']['type'] === 0): ?>
				<?php echo $this->element(
					'../Events/Elements/list',
					['organization' => $organization]
				); ?>
			<?php endif; ?>
			<?php if ((int) $organization['Organization']['type'] === 1): ?>
				<h3>Equipe</h3>
				<div class="row">
					<?php foreach ($organization['Member'] as $member): ?>
						<div class="col-md-6">
							<?php echo $this->element(
								'../Users/Elements/card',
								['user' => $member]
							); ?>
							<?php if (!empty($organizer['avatar'])) {
								echo $this->Html->meta(
									['property' => 'og:image', 'content' => $organizer['avatar']],
									null,
									['inline' => false]
								);
							} ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<div class="row">
				<?php if (isset($organization['Venue']['name'])): ?>
					<div class="col-xs-12 col-sm-6 col-md-12">
						<?php echo $this->element('../Venues/Elements/card', ['venue' => $organization]); ?>
					</div>
				<?php endif; ?>
				<?php if (isset($organization['Organization']['Contacts']['twitter'])): ?>
					<div class="col-xs-12 col-sm-6 col-md-12" style="margin-bottom: 15px;">
						<?php $twitter = $organization['Organization']['Contacts']['twitter']; ?>
						<div id="twitter-timeline" data-screen-name="<?php echo $twitter; ?>"></div>
					</div>
				<?php endif; ?>
				<?php echo $this->element('../Events/Elements/upcoming'); ?>
			</div>
		</div>
	</div>
</div>