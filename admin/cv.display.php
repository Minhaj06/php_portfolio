<?php
session_start();
include_once 'config/dbConnect.php';

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "1") {
        $_SESSION['message'] = "You are not Authorised as ADMIN";
        header("Location: ../index.php");
        exit(0);
    }
}

if (!isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "1") {
        $_SESSION['message'] = "You are not Authorised as ADMIN";
        header("Location: ../login.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Login to access Dashboard";
        header("Location: index.php");
        exit(0);
    }
}

$sql = mysqli_query($conn, "SELECT cv FROM home");
$result = mysqli_fetch_assoc($sql);
$filename = "../assets/files/" . $result['cv'];
header("Content-type: application/pdf");
header("Content-Length: " . filesize($filename));
readfile($filename);