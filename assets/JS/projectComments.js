window.addEventListener("load", () => {
    document.querySelector("#comment_input").innerHTML = "";
});


// enable/disable reply button on keyup
$(document).on("keyup", ".reply_input", function(e) {
    let comment_id = $(this).data("comment-id");
    let replyText = $.trim($("#reply_input" + comment_id).text());

    if (replyText == "") {
        $("#reply_submit" + comment_id).attr("disabled", true);
    } else {
        $("#reply_submit" + comment_id).removeAttr("disabled");
    }
});


// cancel comment
$(document).on("click", ".comment_cancel", function(e) {
    e.preventDefault();
    $("#comment_input").html("");
    $("#comment_submit").attr("disabled", "true");
});


// Comment Edit Icons Toggle
function toggleEditDeleteIcons(toggleFor) {
    $(document).on("click", "." + toggleFor + "_edit_delete_ellipsis", function(e) {
        e.preventDefault();

        let comment_id = $(this).data(toggleFor + "-id");

        $("#" + toggleFor + "_edit_delete_icons" + comment_id).toggleClass("d-none");
    });
}

toggleEditDeleteIcons("comment");
toggleEditDeleteIcons("reply");


// enable/disable comment submit button
$(document).on("keyup", "#comment_input", function(e) {
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
$(document).on("focus", ".reply_input", function() {
    rediretToLogin("../session_check.php", "../login.php");
});



// Add Comment
function submitComment(pageURL, commentFor) {
    $(document).on("click", "#comment_submit", function(e) {
        e.preventDefault();

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
                $("#comments").load(location.href + " #comments>*", "");
            }
        });
    });
}

submitComment("../commentCode.php", "addProjectComment");


// Cancel Comment Update
$(document).on("click", ".comment_update_cancel", function() {
    let comment_id = $(this).data("comment-id");
    toggleDivClass("#single_comment" + comment_id, "comment");
});


// Showing Comment Update Input
function showingCommentInInput(pageURL, commentTextInInputFor, updateCommentFor) {
    $(document).on("click", ".edit_comment_btn", function() {
        let comment_id = $(this).data("comment-id");

        // showing update input
        toggleDivClass("#single_comment" + comment_id, "comment");

        $.ajax({
            type: "GET",
            url: pageURL,
            data: {
                commentTextInInput: commentTextInInputFor,
                comment_id: comment_id,
            },
            success: function(response) {
                $("#update_comment_input" + comment_id).text(response);
                console.log(response)

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
                            $("#comments").load(location.href + " #comments>*", "");
                        }
                    });

                });

            }
        });
    });
}

showingCommentInInput("../commentCode.php", "showingProjectCommentText", "updateProjectComment");



// Delete Comment
$(document).on("click", ".delete_comment_btn", function() {
    let comment_id = $(this).data("comment-id");

    $(this).attr("disabled", true);

    $.ajax({
        type: "POST",
        url: "../commentCode.php",
        data: {
            deleteCommentFor: "deleteProjectComment",
            comment_id: comment_id,
        },
        success: function(response) {

            showMessage(response);

            // Refresh Comments Area
            $("#comments").load(location.href + " #comments>*", "");

            $("#delete_comment_btn" + comment_id).removeAttr("disabled");
        }
    });
});




// ************************Reply Codes************************

// Reply Box Toggle
$(document).on("click", ".reply_btn", function(e) {
    e.preventDefault();
    let comment_id = $(this).data("comment-id");
    $("#reply_box" + comment_id).toggleClass("d-none");
    $("#reply_box" + comment_id).load(location.href + " #reply_box" + comment_id + ">*", "");
});

// Comment Replies Toggle
$(document).on("click", ".show_replies_button", function(e) {
    e.preventDefault();
    let comment_id = $(this).data("comment-id");
    $("#comment_replies" + comment_id).toggleClass("d-none");
});

// cancel reply
$(document).on("click", ".reply_cancel", function(e) {
    e.preventDefault();
    let comment_id = $(this).data("comment-id");
    $("#reply_box" + comment_id).toggleClass("d-none");
    $("#reply_box" + comment_id).load(location.href + " #reply_box" + comment_id + ">*", "");
});

// Add Reply
$(document).on("click", ".reply_submit", function() {
    let comment_id = $(this).data("comment-id");
    let replyText = $.trim($("#reply_input" + comment_id).text());

    $.ajax({
        type: "POST",
        url: "../commentCode.php",
        data: {
            addReply: "addProjectReply",
            comment_id: comment_id,
            replyText: replyText,
        },
        beforeSend: function() {
            btnLoading("#reply_submit" + comment_id);
        },
        success: function(response) {
            removeBtnLoading("#reply_submit" + comment_id, "reply");
            showMessage(response);
            $("#reply_input" + comment_id).html("");

            // Refresh Comments Area
            $("#comments").load(location.href + " #comments>*", "");
        }
    });

});


// Cancel Reply Update
$(document).on("click", ".reply_update_cancel", function() {
    let reply_id = $(this).data("reply-id");
    toggleDivClass("#single_reply" + reply_id, "reply");
});


// Edit Reply
$(document).on("click", ".edit_reply_btn", function() {

    let reply_id = $(this).data("reply-id");

    // showing update input
    toggleDivClass("#single_reply" + reply_id, "reply");

    $.ajax({
        type: "GET",
        url: "../commentCode.php",
        data: {
            replyTextInInput: "showingProjectReplyText",
            reply_id: reply_id,
        },
        success: function(response) {
            $("#update_reply_input" + reply_id).text(response);

            // button enable/disable
            $(".update_reply_input").keyup(function(e) {
                let replyText = $.trim($("#update_reply_input" + reply_id).text());

                if (replyText == response || replyText == "") {
                    $("#reply_update" + reply_id).attr("disabled", true);
                } else {
                    $("#reply_update" + reply_id).removeAttr("disabled");
                }
            });

            // update reply
            $("#reply_update" + reply_id).click(function(e) {
                e.preventDefault();

                let updatedReply = $.trim($("#update_reply_input" + reply_id).text());

                $.ajax({
                    type: "POST",
                    url: "../commentCode.php",
                    data: {
                        reply_id: reply_id,
                        updateReplyFor: "updateProjectReply",
                        updatedReply: updatedReply,
                    },
                    beforeSend: function() {
                        btnLoading("#reply_update" + reply_id);
                    },
                    success: function(response) {
                        removeBtnLoading("#reply_update" + reply_id, "update");

                        showMessage(response);

                        // Refresh comments Area
                        $("#comments").load(location.href + " #comments>*", "");
                    }
                });

            });

        }
    });
});



// Delete Reply
$(document).on("click", ".delete_reply_btn", function() {
    let reply_id = $(this).data("reply-id");

    $(this).attr("disabled", true);

    $.ajax({
        type: "POST",
        url: "../commentCode.php",
        data: {
            deleteReplyFor: "deleteProjectReply",
            reply_id: reply_id,
        },
        success: function(response) {

            showMessage(response);

            // Refresh Comments Area
            $("#comments").load(location.href + " #comments>*", "");

            $("#delete_reply_btn" + comment_id).removeAttr("disabled");
        }
    });
});



// *******************************************
// Add button loading
function btnLoading(btnSelector) {
    $(btnSelector).prepend('<div style="margin-bottom: -4px" class="fs-4 me-2 spinner-border spinner-border" disabled role="status"></div>');
    $(btnSelector).addClass("btnLoading");
    $(btnSelector).attr("disabled", true);
}

// Remove button loading
function removeBtnLoading(btnSelector, btnText) {
    $(btnSelector).text(btnText);
    $(btnSelector).removeClass("btnLoading");
    $(btnSelector).removeAttr("disabled");
}

// Show Message
function showMessage(message) {
    $("#messageBox").modal("show");
    $(".messageShow").html(message);

    setTimeout(function() {
        $("#messageBox").modal("hide");
    }, 2500);
}

// Toggle Div Class
function toggleDivClass(selector, editFor) {
    $(selector + " ." + editFor + "_data").toggleClass("d-none");
    $(selector + " ." + editFor + "_reacts").toggleClass("d-none");
    $(selector + " .reply_btn").toggleClass("d-none");
    $(selector + " ." + editFor + "_edit").toggleClass("d-none");
    $(selector + " ." + editFor + "_edit_delete_icons").addClass("d-none");
}