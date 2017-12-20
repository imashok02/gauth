<?php
require_once 'app/init.php';

$db = new storedb;

$googleClient = new Google_Client;

$auth = new googleauth($db,$googleClient);

if(!$auth->isLoggedIn())
{
	echo "not signed in";
}

if($auth->checkRedirectCode())
{
	header('Location: index.php');
}