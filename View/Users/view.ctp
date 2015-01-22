<?php if (empty(trim($user['User']['Informations']['full_name']))) {
	$user['User']['Informations']['full_name'] = $user['User']['username'];
}
$title_for_layout = $user['User']['Informations']['full_name'];
$this->set(compact('title_for_layout')); ?>
<div role="main">
	<div class="page-header">
		<h1><?php echo h($user['User']['Informations']['full_name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<?php if (!empty($user['User']['avatar']) || isset($user['User']['Informations']['description'])): ?>
				<div class="panel panel-default">
					<div class="media panel-body">
						<?php if (!empty($user['User']['avatar'])): ?>
							<div class="media-left">
								<?php echo $this->Html->image(
									$user['User']['avatar'],
									['width' => '150']
								); ?>
							</div>
						<?php endif; ?>
						<div class="media-body">
							<?php echo @nl2br($this->Text->autoLink($user['User']['Informations']['description'])); ?>
						</div>
					</div>
					<?php if (is_array($user['User']['Contacts'])): ?>
						<div class="panel-footer">
							<?php foreach ($user['User']['Contacts'] as $contact => $url): ?>
								<?php if (!empty($url)): ?>
									<?php $contact = ('website' == $contact ? 'link' : $contact); ?>
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
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<?php if (isset($user['User']['Contacts']['twitter']) && !empty($user['User']['Contacts']['twitter'])): ?>
				<?php $twitter = $user['User']['Contacts']['twitter']; ?>
				<div id="twitter-timeline" data-screen-name="<?php echo $twitter; ?>"></div>
			<?php endif; ?>
		</div>
	</div>
</div>