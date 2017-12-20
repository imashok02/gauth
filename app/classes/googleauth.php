<?php

class googleauth {

		protected $db;
		protected  $client;


	public function __construct(storedb $db = null, Google_Client $googleClient = null)
	{
		$this->db = $db
		$this->client = $googleClient;

		if($this->client)
		{
			$this->client->setClientId('');
			$this->client->setClientSecret('');
			$this->client->setRedirectUri('');
			$this->client->setScope('email');

		}
	}

	public function isLoggedIn()
	{
		return isset($_SESSION['access_token']);
	}

	public function getAuthUrl()
	{
		return $this->client->createAuthUrl();
	}


	public function checkRedirectCode()
	{
		if(isset($_GET['code']))
		{
			$this->client->authenticate($_GET['code']);
			$this->setToken($this->client->getAccessToken());

			$this->storeUser($this->getPayload());

			return true;
		}
		return false;
	}

	public function logout()
	{
		unset($_SESSION['access_token'])
	}

	public function setToken($token)
	{
		$_SESSION['access_token'] = $token;
		$this->client->setAccessToken($token);

	}

	protected function getPayload()
	{
		$payload = $this->client->verifyIdToken()->getAttributes();
		return $payload;
	}

	protected function storeUser($payload)
	{
		$query = //mongo insert values {payload['id']}, {$payload['email']} and make id unique
	}
}