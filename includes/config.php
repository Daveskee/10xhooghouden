<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 2:45 PM
 */

$dbHost = 'localhost';
$dbName = '10xhooghouden';
$dbUser = 'root';
$dbPass = '';

$url = 'http://localhost:63342/10xhooghouden2/';

$db = new PDO(
    "mysql:host=$dbHost;dbname=$dbName",
    $dbUser,
    $dbPass
);

$db->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);