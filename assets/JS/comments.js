window.addEventListener("load", () => {
    document.querySelector(".comment_input").innerHTML = "";
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

$("#comment_input").keyup(function(e) {
    e.preventDefault();
    if ($("#comment_input").html() !== "") {
        $("#comment_submit").removeAttr("disabled");
    } else {
        $("#comment_submit").attr("disabled", true);
    }
});

// Submitting comment
function submitComment(pageURL) {
    $("#comment_submit").on("click", function() {
        let commentText = $("#comment_input").text();

        $.ajax({
            type: "POST",
            url: pageURL,
            data: {
                addComment: 1,
                commentText: commentText
            },
            beforeSend: function() {
                btnLoading("#comment_submit");
            },
            success: function(response) {
                removeBtnLoading("#comment_submit", "comment");
                showMessage('<span class="text-info">Comment Added Successfully</span>');
                $("#comment_input").html("");

                console.log(response);
            }
        });
    });
}

submitComment("post.php");

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