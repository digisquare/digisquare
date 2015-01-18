<div class="panel panel-default">
	<div class="panel-body">
		<div class="embed-responsive embed-responsive-4by3">
			<?php $url = "https://www.google.com/maps/embed/v1/place"
				. '?key=' . Configure::read('GoogleMapsBrowserKey')
				. '&zoom=17'
				// Google Bug: https://code.google.com/p/gmaps-api-issues/issues/detail?id=6768
				// . '&center=' . $venue['Venue']['latitude'] . ',' . $venue['Venue']['longitude']
				// . '&q=' . urlencode($venue['Venue']['oneliner']);
				. '&q=' . urlencode(str_replace($venue['Venue']['name'], '', $venue['Venue']['oneliner']));
			?>
			<iframe class="embed-responsive-item" src="<?php echo $url; ?>"></iframe>
		</div>
	</div>
	<div class="panel-footer">
		<h1 class="panel-title modal-title">
			<?php echo $this->Link->viewVenue($venue); ?>
		</h1>
		<?php echo h($venue['Venue']['address']); ?><br>
		<?php echo h($venue['Venue']['zipcode'] . ' ' . $venue['Venue']['city']); ?><br>
	</div>
</div>