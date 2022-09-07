<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = "";
$dbname = 'coder';

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn) {
    echo '<h2>Database Connection Failure</h2>';
    die();
}

function base_url($base_url)
{
    echo $base_url;
}