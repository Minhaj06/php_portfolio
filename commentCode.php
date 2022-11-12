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


// Add Comment
function addComment($comment_table)
{
    global $conn;

    $blog_id = $_POST['blogID'];
    $user_id = $_SESSION['auth_user']['user_id'];
    $comment = mysqli_real_escape_string($conn, $_POST["commentText"]);

    $query = mysqli_query($conn, "INSERT INTO `$comment_table` (`blog_id`, `user_id`, `comment`) VALUES ('$blog_id','$user_id','$comment')");

    if ($query) {
        echo "Comment Added Successfully.";
    }
}

if (isset($_POST["addComment"]) && $_POST["addComment"] == "addBlogComment") {
    addComment("blog_comments");
} elseif (isset($_POST["addComment"]) && $_POST["addComment"] == "addProjectComment") {
    addComment("project_comments");
}


// Showing comment in input
function showingCommentInInput($commentsTable)
{
    global $conn;

    $comment_id = $_GET['comment_id'];

    $query = mysqli_query($conn, "SELECT comment FROM `$commentsTable` WHERE comment_id = $comment_id");

    if ($query) {
        $comment = mysqli_fetch_assoc($query)['comment'];
        echo $comment;
    } else {
        return false;
    }
}

if (isset($_GET['commentTextInInput']) && $_GET['commentTextInInput'] == "showingBlogCommentText") {
    showingCommentInInput("blog_comments");
} elseif (isset($_GET['commentTextInInput']) && $_GET['commentTextInInput'] == "showingProjectCommentText") {
    showingCommentInInput("project_comments");
}



// Update Comment
function updateComment($commentsTable)
{
    global $conn;

    $comment_id = $_POST['comment_id'];
    $comment = $_POST['updatedComment'];

    $query = mysqli_query($conn, "UPDATE `$commentsTable` SET `comment` = '$comment' WHERE comment_id = $comment_id");

    if ($query) {
        echo "Comment Updated Successfully.";
    }
}


if (isset($_POST['updateCommentFor']) && $_POST['updateCommentFor'] == "updateBlogComment") {
    updateComment("blog_comments");
} elseif (isset($_POST['updateCommentFor']) && $_POST['updateCommentFor'] == "updateProjectComment") {
    updateComment("project_comments");
}



// Delete Comment
function deleteComment($commentsTable, $repliesTable)
{
    global $conn;

    $comment_id = $_POST['comment_id'];

    // $query = mysqli_query($conn, "DELETE FROM `$commentsTable` WHERE comment_id = $comment_id");

    // $query = mysqli_query($conn, "DELETE FROM `$commentsTable` WHERE reply_id = $reply_id");
    $sql = "DELETE FROM `$commentsTable` WHERE comment_id = '$comment_id';";
    $sql .= "DELETE FROM `$repliesTable` WHERE comment_id = '$comment_id'";

    if (mysqli_multi_query($conn, $sql)) {
        echo "Comment Deleted Successfully.";
    }
}


if (isset($_POST['deleteCommentFor']) && $_POST['deleteCommentFor'] == "deleteBlogComment") {
    deleteComment("blog_comments", "blog_replies");
} elseif (isset($_POST['deleteCommentFor']) && $_POST['deleteCommentFor'] == "deleteProjectComment") {
    deleteComment("project_comments", "project_replies");
}



// ************************Reply Codes************************

// Add Reply
function addReply($comment_table)
{
    global $conn;

    $comment_id = $_POST['comment_id'];
    $user_id = $_SESSION['auth_user']['user_id'];
    $reply = mysqli_real_escape_string($conn, $_POST["replyText"]);

    $query = mysqli_query($conn, "INSERT INTO `$comment_table` (`comment_id`, `user_id`, `reply`) VALUES ('$comment_id','$user_id','$reply')");

    if ($query) {
        echo "Reply Added Successfully.";
    }
}


if (isset($_POST["addReply"]) && $_POST["addReply"] == "addBlogReply") {
    addReply("blog_replies");
} elseif (isset($_POST["addReply"]) && $_POST["addReply"] == "addProjectReply") {
    addReply("project_replies");
}


// Showing comment in input
function showingReplyInInput($repliesTable)
{
    global $conn;

    $reply_id = $_GET['reply_id'];

    $query = mysqli_query($conn, "SELECT reply FROM `$repliesTable` WHERE reply_id = $reply_id");

    if ($query) {
        $reply = mysqli_fetch_assoc($query)['reply'];
        echo $reply;
    } else {
        return false;
    }
}

if (isset($_GET['replyTextInInput']) && $_GET['replyTextInInput'] == "showingBlogReplyText") {
    showingReplyInInput("blog_replies");
} elseif (isset($_GET['replyTextInInput']) && $_GET['replyTextInInput'] == "showingProjectReplyText") {
    showingReplyInInput("project_replies");
}


// Update Reply
function updateReply($repliesTable)
{
    global $conn;

    $reply_id = $_POST['reply_id'];
    $reply = $_POST['updatedReply'];

    $query = mysqli_query($conn, "UPDATE `$repliesTable` SET `reply` = '$reply' WHERE reply_id = $reply_id");

    if ($query) {
        echo "Reply Updated Successfully.";
    }
}


if (isset($_POST['updateReplyFor']) && $_POST['updateReplyFor'] == "updateBlogReply") {
    updateReply("blog_replies");
} elseif (isset($_POST['updateReplyFor']) && $_POST['updateReplyFor'] == "updateProjectReply") {
    updateReply("project_replies");
}


// Delete Reply
function deleteReply($repliesTable)
{
    global $conn;

    $reply_id = $_POST['reply_id'];

    $query = mysqli_query($conn, "DELETE FROM `$repliesTable` WHERE reply_id = $reply_id");

    if ($query) {
        echo "Reply Deleted Successfully.";
    }
}


if (isset($_POST['deleteReplyFor']) && $_POST['deleteReplyFor'] == "deleteBlogReply") {
    deleteReply("blog_replies");
} elseif (isset($_POST['deleteReplyFor']) && $_POST['deleteReplyFor'] == "deleteProjectReply") {
    deleteReply("project_replies");
}