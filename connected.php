<?php

$DBConInfo = [
	'server'   => '127.0.0.1',
	'username' => 'root',
	'password' => '',
	'name'     => 'design',
];
$db = new mysqli($DBConInfo['server'], $DBConInfo['username'], $DBConInfo['password'],$DBConInfo['name']);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
require("myClass.php");
$r = new design($db);
