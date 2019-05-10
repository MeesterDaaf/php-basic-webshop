<?php
$dbhost = 'localhost';
$dbname = 'webshop';
$username = 'root';
$password = '';

$conn =  new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);