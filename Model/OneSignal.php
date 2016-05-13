<?php
App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');

class OneSignal extends AppModel {

	public $useTable = false;

	public function push($event) {
		$socket = new HttpSocket(['ssl_verify_host' => false]);

		$response = $socket->post(
			'https://onesignal.com/api/v1/notifications',
			json_encode([
				'app_id' => $_SERVER['DIGI_ONESIGNAL_APP_ID'],
				'included_segments' => ['Bordeaux'],
				'contents' => [
					'en' => 'Nouvel évènement : ' . $event['Event']['name']
				],
				'small_icon' => 'ic_notification',
				'large_icon' => $event['Organization'][0]['avatar'],
				'url' => 'https://digisquare.net/events/' . $event['Event']['id'],
			]),
			[
				'header' => [
					'Authorization' => 'Basic ' . $_SERVER['DIGI_ONESIGNAL_API_KEY'],
					'Content-Type' => 'application/json'
				]
			]
		);

		$body = json_decode($response->body);

		if ($response->code !== '200') {
			throw new Exception($body->errors[0], $response->code);
		} else {
			return $body;
		}
	}
}
