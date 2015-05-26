<div class="panel panel-default">
	<div class="panel-body">
		<div class="media">
			<?php if (!(empty($user['User']['avatar']))): ?>
				<div class="media-left">
					<?php echo $this->Html->image(
						$user['User']['avatar'],
						['width' => '80']
					); ?>
				</div>
			<?php endif; ?>
			<div class="media-body">
				<h4>
					<?php echo h($user['User']['Informations']['first_name']) . ' ' . h($user['User']['Informations']['last_name']); ?>
				</h4>
				<p>
					<?php if (isset($user['User']['Contacts']['twitter']) && !empty($user['User']['Contacts']['twitter'])): ?>
						<?php echo $this->Html->link(
							'<span class="fa-stack fa-lg bc-color-twitter">
								<i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>',
							'https://twitter.com/' . $user['User']['Contacts']['twitter'],
							['target' => '_blank', 'escape' => false, 'title' => 'Twitter']
						); ?>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
</div>