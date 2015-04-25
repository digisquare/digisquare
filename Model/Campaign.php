<?php
App::uses('AppModel', 'Model');
App::uses('LinkHelper', 'View/Helper');
App::uses('TextHelper', 'View/Helper');

class Campaign extends AppModel {
 
	public $useTable = false;

	public $frequency = [
		0 => 'daily',
		1 => 'weekly'
	];

	public $interests = [
		'Fréquence' => 'interests-4469',
		'Edition' => 'interests-4477'
	];

	public $belongsTo = [
		'Mailchimp.Mailchimp',
		'Mailchimp.MailchimpCampaign',
		'Mailchimp.MailchimpSubscriber',
		'Edition'
	];

	public $hasMany = [
		'Event'
	];

	public function makeSegment($frequency, $edition_name) {
		if (!in_array($frequency, [0, 1])) {
			throw new NotFoundException(__('Not a valid frequency'));
		}

		$frequency_value = ($frequency === 0 ? 'Quotidien' : ucfirst(strftime('%A')));

		$segment = [
			'match' => 'all',
			'conditions' => [
				[
					'field' => $this->interests['Fréquence'],
					'op' => 'one',
					'value' => $frequency_value
				],
				[
					'field' => $this->interests['Edition'],
					'op' => 'one',
					'value' => $edition_name
				]					
			]
		];

		return $segment;
	}

	public function testSegment($segment) {
		$test = $this->MailchimpCampaign->campaignSegmentTest($segment);

		if (!isset($test['total']) || !is_int($test['total']) || $test['total'] === 0) {
			return false;
		}

		return $test['total'];
	}

	public function checkFailsafe($frequency, $edition_id) {
		$digest = 'digest_' . $frequency . '_' . $edition_id;
		$failsafe = Cache::read($digest);
		
		if ($failsafe && ($failsafe + 20*60*60) > time()) {
			return false;
		}
		
		Cache::write($digest, time());

		return $digest;
	}

	public function send($data = array(), $filterKey = false) {
		$campaign = $this->MailchimpCampaign->campaignCreate(
			'regular',
			[
				'title' => $data['title'],
				'subject' => $data['subject'],
				'from_email' => 'bonjour@digisquare.net',
				'from_name' => 'Digisquare',
				'template_id' => 65413,
				'authenticate' => true,
				'analytics' => ['google' => true],
			],
			$data['sections'],
			$data['segment']
		);

		if ($campaign && isset($campaign['id'])) {
			return $this->MailchimpCampaign->campaignSend([
				'cid' => $campaign['id']
			]);
		}

		return $campaign;
	}

	public function formatEvents($events) {
		$content = '<table>';

		foreach ($events as $event) {
			$url = LinkHelper::eventUrl(
				$event,
				['full' => true]
			);

			if (isset($event['Organization'][0])) {
				$avatar = '<img src="' . $event['Organization'][0]['avatar'] . '" style="max-width: 80%;" />';
			} else {
				$avatar = '';
			}

			$description = explode('. ', $event['Event']['description']);
			$description = explode("\n", $description[0]);

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

			$content .= '<tr>
				<td width="20%" style="vertical-align:top;padding: 0;">
					' . $avatar . '
				</td>
				<td style="padding:0;">
					<span class="h4">
						<a href="' . $url . '" style="color:#000;text-decoration:none;">
							' . $event['Event']['name'] . '
						</a>
					</span>
					<p style="color:#6f6f6f;">
						@ ' . $event['Venue']['name'] . '
					</p>
					<p>' . String::truncate($description[0], 300) . '</p>
					<a class="btn" href="' . $url .'" class="callToAction">
						' . $datetime . '
					</a>
				</td>
			</tr>';
		}

		$content .= '</table>';

		return $content;
	}
}
