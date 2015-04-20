<div class="content" style="margin:0 auto;padding:15px 0;max-width: 600px;display: block;">
	<table style="margin:0;padding:0;width:100%;">
		<tr style="margin:0;padding:0;">
			<td style="margin:0;padding:0;">
				<h1 style="margin:0;padding:0;line-height:1.1;margin-bottom:15px;color:#000;font-weight:200;font-size:44px;">
					Bonjour *|NAME|*,
				</h1>
				<p style="margin:0;padding:0;margin-bottom:10px;font-weight:normal;font-size:18px;line-height:1.6;">
					Voici les évènements à venir <?php echo $content; ?> :
				</p>
			</td>
		</tr>
	</table>
</div>
<?php foreach ($upcoming_events as $event): ?>
	<?php $url = $this->Link->eventUrl(
		$event,
		['full' => true]
	); ?>
	<div class="content" style="margin: 0 auto;max-width: 600px;display: block;margin-bottom: 30px;">
		<table bgcolor="" style="margin: 0;padding: 0;width: 100%;">
			<tr style="margin: 0;padding: 0;">
				<td class="small" width="20%" style="vertical-align: top;padding-right: 10px;margin: 0;padding: 0;">
					<?php if (isset($event['Organization'][0])): ?>
						<img src="<?php echo $event['Organization'][0]['avatar']; ?>" style="margin: 0;padding: 0;max-width: 80%;" />
					<?php endif; ?>
				</td>
				<td style="margin: 0;padding: 0;">
					<h4 style="margin:0;padding:0;line-height:1.1;margin-bottom:5px;">
						<a href="<?php echo $url; ?>" style="color:#000;font-weight:500;font-size:23px;text-decoration:none">
							<?php echo $event['Event']['name']; ?>
						</a>
					</h4>
					<p style="margin:0;padding:0;margin-bottom:5px;color:#6f6f6f;font-weight:normal;font-size:14px;line-height:1.6;">
						@ <?php echo $event['Venue']['name']; ?>
					</p>
					<p style="margin: 0;padding: 0;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
						<?php $description = explode('. ', $event['Event']['description']); ?>
						<?php $description = explode("\n", $description[0]); ?>
						<?php echo $this->Text->truncate($description[0], 300); ?>
					</p>
					<a class="btn" href="<?php echo $url; ?>" style="margin: 0;padding: 10px 16px;color: #FFF;text-decoration: none;background-color: #666;font-weight: bold;margin-right: 10px;text-align: center;cursor: pointer;display: inline-block;">
						<?php
						$start_at = strtotime($event['Event']['start_at']);
						$end_at = strtotime($event['Event']['end_at']);
						$sameday = (date('Y-m-d', $start_at) === date('Y-m-d', $end_at));
						$allday = ('00:00:00' === date('H:i:s', $start_at) && '00:00:00' === date('H:i:s', $end_at));
						if ($sameday) {
							if ($allday) {
								$datetime = ucwords(strftime('%A %e %B', $start_at));
							} else {
								$datetime = ucwords(strftime('%A %e %B %Y, %R', $start_at));
							}
						} else {
							$datetime = 'Du ' . strtolower(strftime('%A %e %B', $start_at))
								. ' au ' . strtolower(strftime('%A %e %B', $end_at));
						}
						echo $datetime;
						?>
					</a>
				</td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>
<?php if (!empty($newly_created_events)): ?>
	<div class="content" style="margin:0 auto;padding:15px 0;max-width: 600px;display: block;">
		<table style="margin:0;padding:0;width:100%;">
			<tr style="margin:0;padding:0;">
				<td style="margin:0;padding:0;">
					<p style="margin:0;padding:0;margin-bottom:10px;font-weight:normal;font-size:18px;line-height:1.6;">
						Et sinon ça ce sont les derniers évènements ajoutés sur digisquare mais qui auront lieu dans un peu plus longtemps :)
					</p>
					<ul>
						<?php foreach ($newly_created_events as $event): ?>
							<li>
								<?php $url = $this->Link->eventUrl(
									$event,
									['full' => true]
								); ?>
								<a href="<?php echo $url; ?>">
									<?php echo $event['Event']['name']; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</td>
			</tr>
		</table>
	</div>
<?php endif; ?>
<div class="content" style="margin:0 auto;padding:15px 0;max-width:600px;display:block;border-top:1px solid #e5e5e5;">
	<table style="margin:0;padding:0;width:100%;">
		<tr style="margin:0;padding:0;">
			<td style="margin:0;padding:0;">
				<p style="margin:0;padding:0;margin-bottom:10px;font-weight:normal;font-size:11px;line-height:1.6;text-align:center">
					<?php echo $this->Html->link('Préférences', 
						['controller' => 'settings', 'action' => 'edit', 'full_base' => true],
						['style' => 'color:#404040!important;']
					); ?> | <a href="*|UNSUBLINK|*" style="color:#404040!important;">Désinscription</a>
				</p>
			</td>
		</tr>
	</table>
</div>