<?php
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] == false) {
    echo "-1";
} else {
    echo "1";
}