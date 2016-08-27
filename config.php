<?php
$credentials = [
    'host' => 'localhost',
    'port' => '3307',
    'dbname' => 'urlbase',
    'username' => 'root',
    'password' => ''
];
$bdd = new PDO('mysql:host='.$credentials['host'].';port='.$credentials['port'].';dbname='.$credentials['dbname'].'', $credentials['username'], $credentials['password']);