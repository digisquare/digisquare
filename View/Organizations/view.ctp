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
				<div class="panel-body">
					<?php echo nl2br($this->Text->autoLink($organization['Organization']['description'])); ?>
				</div>
				<div class="panel-footer">
					<?php echo $this->Html->link(
						'<span class="fa-stack fa-lg">
							<i class="fa fa-square fa-stack-2x"></i>
							<i class="fa fa-link fa-stack-1x fa-inverse"></i>
						</span>',
						'#',
						['target' => '_blank', 'escape' => false, 'title' => 'Source']
					); ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php if (isset($organization['Place']['name'])): ?>
				<?php echo $this->element('../Places/Elements/card', ['place' => $organization]); ?>
			<?php endif; ?>
		</div>
	</div>
</div>