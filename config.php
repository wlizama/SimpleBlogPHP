<?php

$dbHost = 'localhost';
$dbName = 'bdBlog';
$dbUser = 'root';
$dbPass = 'mysql_root';

try {
	$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", "$dbUser", "$dbPass");//;unix_socket=/var/run/mysqld/mysqld.sock
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo $e->getMessage();
}
