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

$url = "";
$base_url = "http://localhost/coder/";
function base_url($url)
{
    echo "http://localhost/coder/" . $url;
    // echo "https://minhajkobir.com/" . $url;
}