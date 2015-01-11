<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="embed-responsive embed-responsive-4by3">
				<?php $url = "https://www.google.com/maps/embed/v1/place"
					. '?key=' . Configure::read('GoogleMapsBrowserKey')
					. '&zoom=17'
					// Google Bug: https://code.google.com/p/gmaps-api-issues/issues/detail?id=6768
					// . '&center=' . $place['Place']['latitude'] . ',' . $place['Place']['longitude']
					// . '&q=' . urlencode($place['Place']['oneliner']);
					. '&q=' . urlencode(str_replace($place['Place']['name'], '', $place['Place']['oneliner']));
				?>
				<iframe class="embed-responsive-item" src="<?php echo $url; ?>"></iframe>
			</div>
		</div>
		<div class="panel-footer">
			<h1 class="panel-title modal-title">
				<?php echo $this->Link->viewPlace($place); ?>
			</h1>
			<?php echo h($place['Place']['address']); ?><br>
			<?php echo h($place['Place']['zipcode'] . ' ' . $place['Place']['city']); ?><br>
		</div>
	</div>
</div>