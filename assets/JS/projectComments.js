window.addEventListener("load", () => {
    document.querySelector("#comment_input").innerHTML = "";
});

// cancel comment
$(".comment_cancel").click(function(e) {
    e.preventDefault();
    $("#comment_input").html("");
    $("#comment_submit").attr("disabled", "true");
});


// enable/disable reply button on keyup
$(".reply_input").keyup(function(e) {
    let comment_id = $(this).data("comment-id");

    let replyText = $.trim($("#reply_input" + comment_id).text());

    if (replyText == "") {
        $("#reply_submit" + comment_id).attr("disabled", true);
    } else {
        $("#reply_submit" + comment_id).removeAttr("disabled");
    }
});


// cancel reply
$(".reply_cancel").click(function(e) {
    e.preventDefault();
    let comment_id = $(this).data("comment-id");

    $("#reply_box" + comment_id).css("display", "none");
});


// Reply Box Toggle
document.querySelectorAll(".reply_btn").forEach(btn => btn.onclick = ev => {
    const x = ev.target.nextElementSibling.querySelector(".reply_box");
    x.style.display = x.style.display === "none" ? "flex" : "none";
});

// Comment Replies Toggle
document.querySelectorAll(".show_replies_button").forEach(btn => btn.onclick = ev => {
    const x = ev.target.nextElementSibling.querySelector(".comment_replies");
    x.style.display = x.style.display === "none" ? "" : "none";
});

// document.querySelectorAll(".show_replies_button").forEach((element) => {
//     element.addEventListener("click", (replies) => {
//         const targetedReplies = replies.target.nextElementSibling.querySelector(".comment_replies");
//         targetedReplies.style.display = targetedReplies.style.display === "none" ? "" : "none";
//     });
// });

// Comment Edit Icons Toggle
document.querySelectorAll(".comment_edit_delete_ellipsis").forEach((element) => {
    element.addEventListener("click", (ellipsis) => {
        const singleEllipsis = ellipsis.target.nextElementSibling.querySelector(
            ".comment_edit_delete_icons");
        singleEllipsis.style.display = singleEllipsis.style.display === "none" ? "" : "none";
    });
});


// $(document).ready(function() {

// Fetching all comments data
function fetchComments(pageURL, commentsFor, commentsTable) {
    let postID = $("#comment_submit").data("post-id");
    $.ajax({
        type: "POST",
        url: pageURL,
        data: {
            commentsFor: commentsFor,
            commentsTable: commentsTable,
            postID: postID
        },
        dataType: "json",
        success: function(data) {
            for (i = 0; i < data.length; i++) {
                console.log(data[i].comment)
            }
        }
    });
}
// fetchComments("commentCode.php", "blogComments", "blog_comments");


$("#comment_input").keyup(function(e) {
    e.preventDefault();
    if ($("#comment_input").html() !== "") {
        $("#comment_submit").removeAttr("disabled");
    } else {
        $("#comment_submit").attr("disabled", true);
    }
});


// Redirecting to login page
function rediretToLogin(url, redirectPage) {
    $.post(url, function(data) {
        if (data == "-1") {
            window.location = redirectPage;
        }
    });
}

$(".comment_input").focus(function(e) {
    rediretToLogin("../session_check.php", "../login.php");
});
$(".reply_input").focus(function(e) {
    rediretToLogin("../session_check.php", "../login.php");
});



// Add Comment
function submitComment(pageURL, commentFor) {
    $("#comment_submit").on("click", function() {
        let commentText = $("#comment_input").text();
        let blogID = $(this).data("post-id");

        $.ajax({
            type: "POST",
            url: pageURL,
            data: {
                addComment: commentFor,
                blogID: blogID,
                commentText: commentText
            },
            beforeSend: function() {
                btnLoading("#comment_submit");
            },
            success: function(response) {
                removeBtnLoading("#comment_submit", "comment");
                showMessage(response);
                $("#comment_input").html("");

                // Refresh Comments Area
                $("#all_comments").load(location.href + " #all_comments>*", "");
            }
        });
    });
}
submitComment("../commentCode.php", "addProjectComment");

function btnLoading(btnSelector) {
    $(btnSelector).prepend('<div class="spinner-border spinner-border" disabled role="status"></div>');
    $(btnSelector).addClass("btnLoading");
    $(btnSelector).attr("disabled", true);
}

function removeBtnLoading(btnSelector, btnText) {
    $(btnSelector).text(btnText);
    $(btnSelector).removeClass("btnLoading");
    $(btnSelector).removeAttr("disabled");
}

function showMessage(message) {
    $("#messageBox").modal("show");
    $(".messageShow").html(message);

    setTimeout(function() {
        $("#messageBox").modal("hide");
    }, 2000);
}
// });




// Cancel Comment Update
$(".comment_update_cancel").on("click", function() {
    let comment_id = $(this).data("comment-id");
    toggleDivClass("#single_comment" + comment_id);
});

// Toggle Div Class
function toggleDivClass(selector) {
    $(selector + " .comment_data").toggleClass("d-none");
    $(selector + " .comment_reacts").toggleClass("d-none");
    $(selector + " .reply_btn").toggleClass("d-none");
    $(selector + " .comment_edit").toggleClass("d-none");
    $(selector + " .comment_edit_delete_icons").css("display", "none");
}


// Showing Comment Update Input
function showingCommentInInput(pageURL, commentTextInInputFor, updateCommentFor) {
    $(".edit_comment_btn").on("click", function() {
        let comment_id = $(this).data("comment-id");

        // showing update input
        toggleDivClass("#single_comment" + comment_id);

        $.ajax({
            type: "GET",
            url: pageURL,
            data: {
                commentTextInInput: commentTextInInputFor,
                comment_id: comment_id,
            },
            success: function(response) {
                $("#update_comment_input" + comment_id).text(response);

                // button enable/disable
                $(".update_comment_input").keyup(function(e) {
                    let commentText = $.trim($("#update_comment_input" + comment_id).text());

                    if (commentText == response || commentText == "") {
                        $("#comment_update" + comment_id).attr("disabled", true);
                    } else {
                        $("#comment_update" + comment_id).removeAttr("disabled");
                    }
                });

                // update comment
                $("#comment_update" + comment_id).click(function(e) {
                    e.preventDefault();

                    let updatedComment = $.trim($("#update_comment_input" + comment_id).text());

                    $.ajax({
                        type: "POST",
                        url: pageURL,
                        data: {
                            comment_id: comment_id,
                            updateCommentFor: updateCommentFor,
                            updatedComment: updatedComment,
                        },
                        beforeSend: function() {
                            btnLoading("#comment_update" + comment_id);
                        },
                        success: function(response) {
                            removeBtnLoading("#comment_update" + comment_id, "update");

                            showMessage(response);

                            // Refresh Comments Area
                            $("#all_comments").load(location.href + " #all_comments>*", "");
                        }
                    });

                });

            }
        });
    });
}

showingCommentInInput("../commentCode.php", "showingProjectCommentText", "updateProjectComment");



// Comment Reply
$(".reply_submit").on("click", function() {
    let comment_id = $(this).data("comment-id");

    let replyText = $.trim($("#reply_input" + comment_id).text());



});