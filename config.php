<?php
$credentials = [
    'host' => 'localhost',
    'port' => '3307',
    'dbname' => 'urlbase',
    'username' => 'root',
    'password' => ''
];

try {
	$bdd = new PDO('mysql:host='.$credentials['host'].';port='.$credentials['port'].';dbname='.$credentials['dbname'].'', $credentials['username'], $credentials['password']);
} catch (Exception $e) {
	echo $e->getMessage();
}

function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   	$charactersLength = strlen($characters);
   	$randomString = '';
  
   	for ($i = 0; $i < $length; $i++) {
       		 $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
  
    return $randomString;
}