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


// Comment Edit Icons Toggle
document.querySelectorAll(".comment_edit_delete_ellipsis").forEach((element) => {
    element.addEventListener("click", (ellipsis) => {
        const singleEllipsis = ellipsis.target.nextElementSibling.querySelector(
            ".comment_edit_delete_icons");
        singleEllipsis.style.display = singleEllipsis.style.display === "none" ? "" : "none";
    });
});


$(document).ready(function() {

    // Fetching all comments data
    function fetchComments(pageURL, commentsFor, commentsTable) {
        let postID = $("#comment_container").data("post-id");
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
                // for (i = 0; i < data.length; i++) {
                // console.log(data[i].comment_id)
                // }

                for (i = 0; i < data.length; i++) {
                    $("#all_comments").append('\
                        <div id="single_comment2" class="single_comment d-flex mb-4">\
                            <img src="http://localhost/coder/uploaded_img/Minhaj06.jpg" alt="commenter_img" class="commenter_img rounded-circle me-4">\
                            <div class="add_comment_box">\
                                <div class="d-flex justify-content-between comment_data">\
                                    <div class="commenter_comment comment_edit_delete_area">\
                                        <h4 class="commenter_name mb-4 pb-1">Md. Minhaj Kobir</h4>\
                                        <p class="comment_text">' + data[i].comment + '</p>\
                                    </div>\
                                    <div class="comment_edit_delete_icons_area">\
                                        <button class="comment_edit_delete_ellipsis fa-solid fa-ellipsis-vertical"></button>\
                                        <div>\
                                            <div class="comment_edit_delete_icons" style="display: none;">\
                                                <button id="edit_comment_btn2" class="edit_comment_btn" data-comment-id="2"><i class="fa-solid fa-pen-fancy"></i>Edit</button>\
                                                <button id="delete_comment_btn2" class="delete_comment_btn" data-comment-id="2"><i class="fa-solid fa-trash-can"></i>Delete</button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="comment_edit d-none" style="margin-bottom: -1rem;">\
                                    <div id="update_comment_input2" data-comment-id="2" class="update_comment_input edit_content mb-2" contenteditable="true" placeholder="Type to update..."></div>\
                                    <div class="text-end">\
                                        <button id="comment_update_cancel2" data-comment-id="2" class="comment_update_cancel cancel_btn btn px-4">cancel</button>\
                                        <button id="comment_update2" data-comment-id="2" class="comment_update submit_btn btn px-4" disabled="">update</button>\
                                    </div>\
                                </div>\
                                <div class="comment_reacts d-flex align-items-center float-start">\
                                    <div class="me-4"><span role="button" title="I like this comment"><i class="fa-regular fa-thumbs-up"></i></span> 5.3k</div>\
                                    <div class="me-4"><span role="button" title="I dislike this comment"><i class="fa-regular fa-thumbs-down"></i></span> 23</div>\
                                </div>\
                                <button class="reply_btn">reply</button>\
                                <div>\
                                    <div id="reply_box2" class="reply_box mt-2" style="display: none; margin-bottom: -1rem;">\
                                        <img src="http://localhost/coder/assets/images/avatar.jpg" alt="replier_img" class="replier_img rounded-circle me-4">\
                                        <div class="add_reply_box">\
                                            <div id="reply_input2" data-comment-id="2" class="reply_input edit_content mb-2" contenteditable="true" placeholder="Add a reply...">@Md. Minhaj Kobir,&nbsp;</div>\
                                            <div class="text-end">\
                                                <button id="reply_cancel2" data-comment-id="2" class="reply_cancel cancel_btn btn px-4">cancel</button>\
                                                <button id="reply_submit2" data-comment-id="2" class="reply_submit submit_btn btn px-4" disabled="">reply</button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    ');
                };

                console.log(all_comments)
            }
        });
    }
    // fetchComments("commentCode.php", "blogComments", "blog_comments");

});

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
    rediretToLogin("session_check.php", "login.php");
});
$(".reply_input").focus(function(e) {
    rediretToLogin("session_check.php", "login.php");
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
                $("#comments").load(location.href + " #comments>*", "");
            }
        });
    });
}

submitComment("commentCode.php", "addBlogComment");

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
                            $("#comments").load(location.href + " #comments>*", "");
                        }
                    });

                });

            }
        });
    });
}

showingCommentInInput("commentCode.php", "showingBlogCommentText", "updateBlogComment");



// Delete Comment
$(".delete_comment_btn").on("click", function() {
    let comment_id = $(this).data("comment-id");

    $(this).attr("disabled", true);

    $.ajax({
        type: "POST",
        url: "commentCode.php",
        data: {
            deleteCommentFor: "deleteBlogComment",
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

// Cancel Reply
$(".reply_cancel").on("click", function() {
    let comment_id = $(this).data("comment-id");

    $("#reply_input" + comment_id).html("");
});



// Add Reply
$(".reply_submit").on("click", function() {
    let comment_id = $(this).data("comment-id");
    let replyText = $.trim($("#reply_input" + comment_id).text());

    $.ajax({
        type: "POST",
        url: "commentCode.php",
        data: {
            addReply: "addBlogReply",
            comment_id: comment_id,
            replyText: replyText,
        },
        beforeSend: function() {
            btnLoading("#reply_submit" + comment_id);
        },
        success: function(response) {
            removeBtnLoading("#reply_submit" + comment_id, "reply");
            showMessage(response);
            ("#reply_input" + comment_id).html("");

            // Refresh Comments Area
            $("#comments").load(location.href + " #comments>*", "");
        }
    });

});