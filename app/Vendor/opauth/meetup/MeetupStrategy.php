<?php
/**
 * Meetup strategy for Opauth
 * Based on https://github.com/opauth/github
 * 
 * More information on Opauth: http://opauth.org
 * 
 * @copyright    Copyright © 2014 Damien Varron (http://www.effervea.com)
 * @link         http://opauth.org
 * @package      Opauth.MeetupStrategy
 * @license      MIT License
 */

/**
 * Meetup strategy for Opauth
 * 
 * @package         Opauth.Meetup
 */
class MeetupStrategy extends OpauthStrategy
{

    /**
     * Compulsory config keys, listed as unassociative arrays
     */
    public $expects = array('key', 'secret');

    /**
     * Optional config keys, without predefining any default values.
     */
    public $optionals = array('redirect_uri', 'scope');

    /**
     * Optional config keys with respective default values, listed as associative arrays
     * eg. array('scope' => 'email');
     */
    public $defaults = array(
        'redirect_uri' => '{complete_url_to_strategy}oauth2callback',
        'scope' => 'basic'
    );

    /**
     * Auth request
     */
    public function request()
    {
        $url = 'https://secure.meetup.com/oauth2/authorize';
        $params = array(
            'client_id' => $this->strategy['key'],
            'redirect_uri' => $this->strategy['redirect_uri'],
            'response_type' => 'code',
        );

        foreach ($this->optionals as $key) {
            if (!empty($this->strategy[$key])) {
                $params[$key] = $this->strategy[$key];
            }
        }

        $this->clientGet($url, $params);
    }

    /**
     * Internal callback, after OAuth
     */
    public function oauth2callback()
    {
        if (array_key_exists('code', $_GET) && !empty($_GET['code'])) {
            $code = $_GET['code'];
            $url = 'https://secure.meetup.com/oauth2/access';

            $params = array(
                'code' => $code,
                'grant_type' => 'authorization_code',
                'client_id' => $this->strategy['key'],
                'client_secret' => $this->strategy['secret'],
                'redirect_uri' => $this->strategy['redirect_uri'],
            );
            if (!empty($this->strategy['state'])) {
                $params['state'] = $this->strategy['state'];
            }

            $response = $this->serverPost($url, $params, null, $headers);
            $results = json_decode($response, true);

            if (!empty($results) && !empty($results['access_token'])) {
                $user = $this->user($results['access_token']);

                $this->auth = array(
                    'uid' => $user['id'],
                    'info' => array(),
                    'credentials' => array(
                        'token' => $results['access_token']
                    ),
                    'raw' => $user
                );

                $this->mapProfile($user, 'name', 'info.name');
                $this->mapProfile($user, 'city', 'info.location');
                $this->mapProfile($user, 'photo.photo_link', 'info.image');
                $this->mapProfile($user, 'link', 'info.urls.meetup');

                $this->callback();
            } else {
                $error = array(
                    'code' => 'access_token_error',
                    'message' => 'Failed when attempting to obtain access token',
                    'raw' => array(
                        'response' => $response,
                        'headers' => $headers
                    )
                );

                $this->errorCallback($error);
            }
        } else {
            $error = array(
                'code' => 'oauth2callback_error',
                'raw' => $_GET
            );

            $this->errorCallback($error);
        }
    }
    
    /**
     * Queries Meetup v2 API for user info
     *
     * @param string $access_token 
     * @return array Parsed JSON results
     */
    private function user($access_token)
    {
        $response = $this->serverGet(
            'https://api.meetup.com/2/members',
            array('sign' => 'true', 'member_id' => 'self', 'access_token' => $access_token),
            null,
            $headers
        );

        if (!empty($response)) {
            $results = $this->recursiveGetObjectVars(json_decode($response));

            return $results['results'][0];
        } else {
            $error = array(
                'code' => 'userinfo_error',
                'message' => 'Failed when attempting to query Meetup v2 API for user information',
                'raw' => array(
                    'response' => $response,
                    'headers' => $headers
                )
            );

            $this->errorCallback($error);
        }
    }
}