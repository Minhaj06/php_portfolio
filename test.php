<?php
if (isset($_POST["addComment"])) {
    $comment = $_POST["commentText"];

    echo "<script>console.log(200)</script>";
    echo '<script>alert("Hello")</script>';
} else {
    echo "<script>alert('error')</script>";
}