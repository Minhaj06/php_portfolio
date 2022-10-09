<?php
include 'admin/config/dbConnect.php';
// Adding Comment
// function addComment($commentFor)
// {
//     if (isset($_POST["addComment"]) && $_POST["addComment"] == $commentFor) {
//         $comment = $_POST["commentText"];

//         echo $comment;
//     }
// }

// addComment("addBlogComment");

if (isset($_POST["addComment"])) {
    $blog_id = $_POST['blogID'];
    $user_id = $_SESSION['auth_user']['user_id'];
    $comment = mysqli_real_escape_string($conn, $_POST["commentText"]);

    $query = mysqli_query($conn, "INSERT INTO `blog_comments`(`blog_id`, `user_id`, `comment`) VALUES ('$blog_id','$user_id','$comment')");

    if ($query) {
        echo "Comment added successfully";
    }
}