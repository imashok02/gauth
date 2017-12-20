<?php


require_once 'app/init.php';

$auth = new googleauth;

$auth->logout();

header('Location: index.php');