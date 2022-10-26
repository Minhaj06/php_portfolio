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


// Showing comment in input
function showingCommentInInput($showingCommentFor, $commentsTable)
{
    global $conn;

    if (isset($_GET['commentTextInInput']) && $_GET['commentTextInInput'] == $showingCommentFor) {

        $comment_id = $_GET['comment_id'];

        $query = mysqli_query($conn, "SELECT comment FROM `$commentsTable` WHERE comment_id = $comment_id");

        if ($query) {
            $comment = mysqli_fetch_assoc($query)['comment'];
            echo $comment;
        } else {
            return false;
        }
    }
}

showingCommentInInput("showingBlogCommentText", "blog_comments");


// Update Comment
function updateComment($updateCommentFor, $commentsTable)
{
    global $conn;

    if (isset($_POST['updateCommentFor']) && $_POST['updateCommentFor'] == $updateCommentFor) {

        $comment_id = $_POST['comment_id'];
        $comment = $_POST['updatedComment'];

        $query = mysqli_query($conn, "UPDATE `$commentsTable` SET `comment` = '$comment' WHERE comment_id = $comment_id");

        if ($query) {
            echo "Comment Updated Successfully.";
        } else {
            echo "Error";
            return false;
        }
    }
}

updateComment("updateBlogComment", "blog_comments");