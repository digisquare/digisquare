<?php 
$url = 'https://maps.googleapis.com/maps/api/js?key=' . Configure::read('GoogleMapsBrowserKey');
echo $this->Html->script($url);
?>
<?php if (isset($edition)) {
	$title = 'Tous les lieux actifs du numérique à ' . $this->Link->viewEdition($edition);
	$this->set('title_for_layout', 'Tous les lieux actifs du numérique à ' . $edition['Edition']['name']);
	$url = ['slug' => $edition['Edition']['slug']];
} else {
	$title = 'Tous les lieux actifs du numérique';
	$this->set('title_for_layout', 'Tous les lieux actifs du numérique en France');
	$url = [];
} ?>
<div role="main">
	<div class="page-header">
		<?php if (1 == $this->Session->read('Auth.User.group_id')): ?>
			<?php echo $this->Html->link(
				'<i class="icon-plus-sign icon-white"></i> ' . __('Merge'),
				array('controller' => 'venues', 'action' => 'merge'),
				array('escape' => false, 'class' => 'btn btn-primary pull-right')
			); ?>
		<?php endif; ?>
		<h1><?php echo $title; ?></h1>
	</div>
	<div class="row">
		<div class="hidden-xs col col-md-8">
			<div id="map-canvas" style="height:550px;margin-bottom:20px;"></div>
			<script type="text/javascript">
				var markers = [];

				function myClick(id) {
					google.maps.event.trigger(markers[id], 'click');
				}

				function initialize() {
					var infowindow;

					var mapOptions = {
						center: { 
							lat: <?php echo $venues[0]['Venue']['latitude'] ?>,
							lng: <?php echo $venues[0]['Venue']['longitude'] ?>
						},
						zoom: 14
					};

					var map = new google.maps.Map(
						document.getElementById('map-canvas'),
						mapOptions
					);

					<?php foreach ($venues as $venue): ?>
						<?php $id = $venue['Venue']['id'];
						$content = '<strong>' . $this->Link->viewVenue($venue) . '</strong><br>';
						$content .= h($venue['Venue']['address']) . '<br>';
						$content .= h($venue['Venue']['zipcode'] . ' ' . $venue['Venue']['city']) . '<br>';
						$content .= '<div style="width:200px">';
						foreach ($venue['Organization'] as $organization) {
							$content .= $this->Link->viewOrganization(
								$this->Html->image(
									$organization['avatar'],
									['height' => 40, 'width' => 40, 'style' => 'margin: 0 10px 10px 0; float: left;']
								),
								[
									'Organization' => $organization,
									'Edition' => $organization['Edition']
								],
								['escape' => false]
							);
						}
						$content .= '</div>'; ?>

						var marker = new google.maps.Marker({
							position: new google.maps.LatLng(
								<?php echo $venue['Venue']['latitude'] ?>,
								<?php echo $venue['Venue']['longitude'] ?>
							),
							map: map,
							animation: google.maps.Animation.DROP,
							title: "<?php echo $venue['Venue']['name'] ?>"
						});

						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function() {
								if (infowindow) infowindow.close();
								infowindow = new google.maps.InfoWindow({
									content: '<?php echo $content; ?>'
								});
								infowindow.open(map, marker);
							}
						})(marker, <?php echo $id; ?>));

						markers[<?php echo $id; ?>] = marker;

					<?php endforeach; ?>

					window.setTimeout(function() {
							google.maps.event.trigger(markers[<?php echo $venues[0]['Venue']['id']; ?>], 'click');
						},
						1500
					);
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 row row-flex row-flex-wrap" style="height:550px;overflow-y:scroll;padding-top:1px;">
			<div class="col-xs-12 col-sm-6 col-md-12">
				<?php echo $this->element('../Campaigns/Elements/subscribe'); ?>
			</div>
			<?php foreach ($venues as $venue): ?>
				<?php if (!empty($venue['Organization'])): ?>
					<div class="col-xs-12 col-sm-6 col-md-12" onmouseover="myClick(<?php echo $venue['Venue']['id']; ?>)">
						<div class="panel panel-default" style="width:100%;">
							<div class="panel-heading">
								<?php if (isset($venue[0])): ?>
									<span class="badge"><?php echo $venue[0]['event_count']; ?></span>
								<?php endif; ?>
								<?php echo $this->Link->viewVenue($venue); ?>
							</div>
							<div class="panel-body">
								<?php foreach ($venue['Organization'] as $organization) {
									echo $this->Link->viewOrganization(
										$this->Html->image(
											$organization['avatar'],
											['height' => 45, 'width' => 45, 'style' => 'margin: 0 10px 10px 0; float: left;']
										),
										[
											'Organization' => $organization,
											'Edition' => $organization['Edition']
										],
										['escape' => false]
									);
								} ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
	<div style="margin: 10px 0;">
		<span class="badge">x</span> indique le nombre d'évènements recensés sur digisquare depuis 42 jours
	</div>
	<?php echo $this->Paginator->pagination([
		'ul' => 'pagination',
		'url' => $url
	]); ?>
</div>