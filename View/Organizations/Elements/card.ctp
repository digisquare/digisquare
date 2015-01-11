<div class="panel panel-default flex-col">
	<div class="panel-body flex-grow">
		<div class="media">
			<?php if (!(empty($organization['Organization']['avatar']))): ?>
				<div class="media-left">
					<?php echo $this->Html->image(
						str_replace('_normal', '_400x400', $organization['Organization']['avatar']),
						['width' => '100']
					); ?>
				</div>
			<?php endif; ?>
			<div class="media-body">
				<h4>
					<?php echo $this->Link->viewOrganization($organization); ?>
				</h4>
				<p>
					<?php $description = explode('. ', $organization['Organization']['description']); ?>
					<?php echo $this->Text->truncate($description[0], 140); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<?php foreach ($organization['Organization']['Contacts'] as $contact => $url): ?>
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
</div>