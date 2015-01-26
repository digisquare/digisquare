<?php
$edition['Edition'] = $this->Session->read('Edition');
$properties['edition'] = $edition['Edition']['name'];
$properties['action'] = $this->action;
if (isset($event['Venue']['name'])) {
	$properties['venue'] = $event['Venue']['name'];
}
switch ($this->action) {
	case 'index':
		$page = $this->name;
		break;
	
	case 'view':
		$page = Inflector::singularize($this->name);
		break;

	case 'display':
		if (isset($page)) {
			$page = ucfirst($page);
		}
		break;
} ?>
<script type="text/javascript">
	!function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","group","track","ready","alias","page","once","off","on"];analytics.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);analytics.push(e);return analytics}};for(var t=0;t<analytics.methods.length;t++){var e=analytics.methods[t];analytics[e]=analytics.factory(e)}analytics.load=function(t){var e=document.createElement("script");e.type="text/javascript";e.async=!0;e.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.com/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};analytics.SNIPPET_VERSION="3.0.1";
	<?php if (0 === Configure::read('debug')): ?>
		analytics.load("CZshTzkiNsRSu2pQM4xNwMZW7gPAQJrn");
	<?php else: ?>
		analytics.load("VHEoCCBEboJiFT3NRQvcT6NgwYIsTyX1");
	<?php endif; ?>
	<?php if (isset($page) && !empty($page)) {
		echo 'analytics.page("';
		echo $page . '"';
		if (isset($properties) && is_array($properties)) {
			echo ', {';
				$first = true;
				foreach ($properties as $key => $value) {
					if ($first) {
						$first = false;
					} else {
						echo ', ';
					}
					echo $key . ': "' . $value .'"';
				}
			echo '}';
		};
		echo ');';
	} else {
		echo 'analytics.page();';
	} ?>
	<?php if ($this->Session->check('Auth.User')) {
		$user = $this->Session->read('Auth.User');
		echo 'analytics.identify(' . $user['id'] . ', {
			username: "' . $user['username'] . '",
			email: "' . $user['email'] . '",
			avatar: "' . $user['avatar'] . '",
			createdAt: "' . $user['created'] . '",
			firstName: "' . $user['Informations']['first_name'] . '",
			lastName: "' . $user['Informations']['last_name'] . '",
			description: "' . $user['Informations']['description'] . '",
			website: "' . $user['Contacts']['website'] . '",
			facebook: "' . $user['Contacts']['facebook'] . '",
			twitter: "' . $user['Contacts']['twitter'] . '"
		});';
	} ?>
  }}();
</script>