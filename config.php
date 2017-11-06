<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbHost = 'HOST_HERE';
$dbName = 'BD_HERE';
$dbUser = 'USER_HERE';
$dbPass = 'PASSWORD_HERE';

try {
	$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", "$dbUser", "$dbPass");//;unix_socket=/var/run/mysqld/mysqld.sock
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
}
