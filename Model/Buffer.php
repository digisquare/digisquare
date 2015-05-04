<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');

class Buffer extends AppModel {

	public $useTable = false;

	public function send($tweet) {
		if (empty($tweet['text'])) {
			return false;
		}

		$socket = new HttpSocket();

		if ($tweet['scheduled_at'] === 'now') {
			$tweet['scheduled_at'] = date('c', time() + 5*60);
		}

		$response = $socket->post(
			'https://api.bufferapp.com/1/updates/create.json',
			array_merge(
				[
					'access_token' => $_SERVER['DIGI_BUFFER_ACCESS_TOKEN'],
					'profile_ids' => [
						$_SERVER['DIGI_BUFFER_BDX_ID']
					],
				],
				$tweet
			)
		);

		$body = json_decode($response->body);

		if (!$body->success) {
			throw new Exception($body->message, $body->code);
		} else {
			return $body;
		}
	}
}
