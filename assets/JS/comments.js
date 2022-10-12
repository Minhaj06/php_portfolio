window.addEventListener("load", () => {
    document.querySelector(".comment_input").innerHTML = "";
});

window.addEventListener("load", () => {
    document.querySelectorAll(".reply_input").forEach((eachInput) => {
        eachInput.innerHTML = "";
    });
});

// Cancel Reply
document.querySelectorAll(".reply_btn").forEach(btn => btn.onclick = ev => {
    const x = ev.target.nextElementSibling.querySelector(".reply_box");
    x.style.display = x.style.display === "none" ? "flex" : "none";
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

// document.querySelectorAll(".show_replies_button").forEach((element) => {
//     element.addEventListener("click", (replies) => {
//         const targetedReplies = replies.target.nextElementSibling.querySelector(".comment_replies");

//         if (targetedReplies.style.display === "none") {
//             targetedReplies.style.display = "";
//         } else {
//             targetedReplies.style.display = "none";
//         }
//     });
// });

// Adding comments

// document.querySelector(".comment_submit").addEventListener("click", () => {
//     alert("hello")
// });

$(document).ready(function() {

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
    $(".comment_submit").focus(function(e) {
        e.preventDefault();

        function rediretToLogin(url, redirectPage) {
            $.post(url, function(data) {
                if (data == "-1") {
                    window.location = redirectPage;
                }
            });
        }
        rediretToLogin("session_check.php", "login.php");
    });

    // Submitting comment
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
                    // $("#all_comments").load(location.href + " #all_comments>*", "");
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
});