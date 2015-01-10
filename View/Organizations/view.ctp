<div role="main">
	<div class="page-header">
		<?php echo $this->Html->link(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Edit'),
			['action' => 'edit', 'id' => $organization['Organization']['id']],
			['escape' => false, 'class' => 'btn btn-primary pull-right']
		); ?>
		<?php echo $this->Form->postLink(
			'<i class="icon-plus-sign icon-white"></i> ' . __('Delete'),
			['action' => 'delete', 'id' => $organization['Organization']['id']],
			['escape' => false, 'class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px;'],
			__('Are you sure you want to delete # %s?', $organization['Organization']['id'])
		); ?>
		<h1><?php echo h($organization['Organization']['name']); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="media panel-body">
					<?php if (!(empty($organization['Organization']['avatar']))): ?>
						<div class="media-left">
							<?php echo $this->Html->image(
								str_replace('_normal', '_400x400', $organization['Organization']['avatar']),
								['width' => '150']
							); ?>
						</div>
					<?php endif; ?>
					<div class="media-body">
						<?php echo nl2br($this->Text->autoLink($organization['Organization']['description'])); ?>
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
			<?php echo $this->element(
				'../Events/Elements/list',
				['organization' => $organization]
			); ?>
		</div>
		<div class="col-md-4">
			<?php if (isset($organization['Place']['name'])): ?>
				<?php echo $this->element('../Places/Elements/card', ['place' => $organization]); ?>
			<?php endif; ?>
		</div>
	</div>
</div>