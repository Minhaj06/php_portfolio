<?php
include 'admin/config/dbConnect.php';

// Fetching all comments data
function fetchingCommentsData($commentsFor)
{
    global $conn;
    if (isset($_POST['commentsFor']) && $_POST['commentsFor'] == $commentsFor) {

        $commentsTable = $_POST['commentsTable'];
        $postID = $_POST['postID'];

        $query = mysqli_query($conn, "SELECT * FROM `$commentsTable` WHERE blog_id = $postID");

        if (mysqli_num_rows($query) > 0) {
            $commentsData = array();
            while ($row = mysqli_fetch_assoc($query)) {
                $commentsData[] = $row;
            }
        }
        echo json_encode($commentsData);
    }
}
fetchingCommentsData("blogComments");





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