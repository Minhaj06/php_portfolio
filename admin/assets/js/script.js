const RequestURL = "http://localhost/coder/admin/code";


// sidebar click & dark event
const body = document.querySelector("body"),
    sidebar = document.querySelector(".sidebar"),
    main = document.querySelector(".main"),
    toggle = document.querySelector(".toggle"),
    topNavRight = document.querySelector(".top_nav_right"),
    searchBtn = document.querySelector(".search_box"),
    modeSwitch = document.querySelector(".toggle_switch"),
    modeText = document.querySelector(".mode_text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("hide");
    sidebar.classList.toggle("sideTop");
    topNavRight.classList.toggle("show_right_nav");
    main.classList.toggle("mainTop");
});

searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("hide");
});

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        modeText.innerText = "Light Mode";
        localStorage.setItem("mode", "dark");
    } else {
        modeText.innerText = "Dark Mode";
        localStorage.setItem("mode", "light");
    }
});

// menu link active
const nav_link = document.querySelectorAll(".nav_link a");

nav_link.forEach((element) => {
    element.addEventListener("click", function() {
        nav_link.forEach((link) => link.classList.remove("active"));

        this.classList.add("active");
    });
});

// sidebar dropdown menu

// let dropdown1 = document.querySelector(".dropdown1");
// let dropdown2 = document.querySelector(".dropdown2");
// let sub_menu1 = document.querySelector(".sub_menu1");
// let sub_menu2 = document.querySelector(".sub_menu2");
// let drop_icon1 = document.querySelector(".drop_icon1");
// let drop_icon2 = document.querySelector(".drop_icon2");

// dropdown1.addEventListener("click", () => {
//     sub_menu1.classList.toggle("sub_menu_show");
//     drop_icon1.classList.toggle("rotate");

//     sub_menu2.classList.remove("sub_menu_show");
//     drop_icon2.classList.remove("rotate");
// });

// dropdown2.addEventListener("click", () => {
//     sub_menu2.classList.toggle("sub_menu_show");
//     drop_icon2.classList.toggle("rotate");

//     sub_menu1.classList.remove("sub_menu_show");
//     drop_icon1.classList.remove("rotate");
// });

$(".dropdown1").click(function(e) {
    $(".sub_menu1").toggleClass("sub_menu_show");
    $(".drop_icon1").toggleClass("rotate");

    $(".sub_menu2").removeClass("sub_menu_show");
    $(".drop_icon2").removeClass("rotate");

    $(".sub_menu3").removeClass("sub_menu_show");
    $(".drop_icon3").removeClass("rotate");
});

$(".dropdown2").click(function(e) {
    $(".sub_menu2").toggleClass("sub_menu_show");
    $(".drop_icon2").toggleClass("rotate");

    $(".sub_menu1").removeClass("sub_menu_show");
    $(".drop_icon1").removeClass("rotate");

    $(".sub_menu3").removeClass("sub_menu_show");
    $(".drop_icon3").removeClass("rotate");
});

$(".dropdown3").click(function(e) {
    $(".sub_menu3").toggleClass("sub_menu_show");
    $(".drop_icon3").toggleClass("rotate");

    $(".sub_menu1").removeClass("sub_menu_show");
    $(".drop_icon1").removeClass("rotate");

    $(".sub_menu2").removeClass("sub_menu_show");
    $(".drop_icon2").removeClass("rotate");
});

// #########################################################################

// Data table ready function
$(document).ready(function() {
    $("#usersDataTable").DataTable();
});

// alert message function
function showMessage(message) {
    document.querySelector(".message_show").classList.remove("d-none");
    document.querySelector(".btn-close").addEventListener("click", function() {
        document.querySelector(".message_show").classList.add("d-none");
    });
}

// Reload location On dismiss modal
function modalDismiss() {
    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach((item) => {
        item.addEventListener("click", function() {
            location.reload();
        });
    });
}

// Empty alert
function emptyAlert() {
    $("#alertBox").modal("show");
    $(".alertMessage").html("Oops! Fill up all the fields...");
}


// Initialize Summernote
$("#add_post_description").summernote({
    placeholder: 'Post description goes here',
    height: 300
});
$("#edit_post_description").summernote({
    placeholder: 'Post description goes here',
    height: 300
});
$('.dropdown-toggle').dropdown();


// $(document).ready(function() {
// check username exists or not
$("#add_username").keyup(function(e) {
    let username = $("#add_username").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            CheckAddUsername: 1,
            username: username,
        },

        success: function(data) {
            if (data != "0") {
                $(".add_username_error").html(
                    "<span class='text-danger'>Username already taken!</span>"
                );
                $(".add_user").attr("disabled", true);
                $("#add_email").attr("disabled", true);
            } else {
                $(".add_username_error").html(
                    "<span class='text-success'>It's available</span>"
                );
                $(".add_user").attr("disabled", false);
                $("#add_email").attr("disabled", false);
            }
        },
    });
});

// check email exists or not
$("#add_email").keyup(function(e) {
    let email = $("#add_email").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            CheckAddEmail: 1,
            email: email,
        },

        success: function(data) {
            if (data != "0") {
                $(".add_email_error").html(
                    "<span class='text-danger'>Email already taken!</span>"
                );
                $(".add_user").attr("disabled", true);
            } else {
                $(".add_email_error").html(
                    "<span class='text-success'>It's available</span>"
                );
                $(".add_user").attr("disabled", false);
            }
        },
    });
});
// });

$(document).on("submit", "#add_user_form", function(e) {
    e.preventDefault();

    let fname = $("#add_fname").val();
    let lname = $("#add_lname").val();
    let username = $("#add_username").val();
    let email = $("#add_email").val();
    let contact_no = $("#add_contact_no").val();
    let password = $("#add_password").val();
    let image = $("#add_image").get(0).files.length === 0;

    if (
        fname == "" ||
        lname == "" ||
        username == "" ||
        email == "" ||
        contact_no == "" ||
        password == "" ||
        image
    ) {
        emptyAlert();
    } else {
        let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

        if (pattern.test(email)) {
            $.ajax({
                url: RequestURL,
                type: "POST",
                // dataType: "json",
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // console.log("Wait..Data is loading...");
                },
                success: function(response) {
                    // reset form
                    $("#add_user_form")[0].reset();

                    // hide form
                    $("#add_user_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Table Data
                    $("#userData").load(location.href + " #userData>*", "");
                },
                error: function(request, error) {
                    console.log(arguments);
                    console.log("Error: " + error);
                },
            });
        } else {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Not a valid email address!");
        }
    }
});
// #########################################################################

// Update User Data
// $(document).ready(function() {
$(document).on("click", "span[data-role=edit]", function() {
    let id = $(this).data("id");
    modalDismiss();

    // Store data by id
    let fname = $("#" + id)
        .children("td[data-target=fname]")
        .text();
    console.log(fname);
    let lname = $("#" + id)
        .children("td[data-target=lname]")
        .text();
    let username = $("#" + id)
        .children("td[data-target=username]")
        .text();
    let email = $("#" + id)
        .children("td[data-target=email]")
        .text();
    let contact_no = $("#" + id)
        .children("td[data-target=contact_no]")
        .text();
    let role_as = $("#" + id)
        .children("td[data-target=role_as]")
        .children("span")
        .text();

    // Modal User Profile Pic
    $("#modal_img").attr("src", "../uploaded_img/" + username + ".jpg");
    $("#modal_username").html(username);
    $("#modal_email").html(email);

    // Fetching data in modal input
    $("#user_id").val(id);
    $("#fname").val(fname);
    $("#lname").val(lname);
    $("#username").val(username);
    $("#email").val(email);
    $("#contact_no").val(contact_no);

    // Checking role and add value in option
    let roleCheck = $("#" + id)
        .children("td[data-target=role_as]")
        .children("input")
        .val();
    if (roleCheck == 0) {
        $(".option_1").text("User").val(0).attr("selected", "selected");
        $(".option_2").text("Admin").val(1);
    } else if (roleCheck == 1) {
        $(".option_1").text("Admin").val(1).attr("selected", "selected");
        $(".option_2").text("User").val(0);
    }

    // username live checking exist or not
    $("#username").keyup(function(e) {
        let id = $("#user_id").val();
        let td_username = $("#" + id)
            .children("td[data-target=username]")
            .text();
        let username = $("#username").val();
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkUsername: 1,
                username: username,
                check_id: id,
            },

            success: function(data) {
                if (
                    data != "0" &&
                    username.toLowerCase() != td_username.toLowerCase()
                ) {
                    $(".username_error").html(
                        "<span class='text-danger'>Username already taken!</span>"
                    );
                    $("#update_user").attr("disabled", true);
                    $("#email").attr("disabled", true);
                } else {
                    $(".username_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#update_user").attr("disabled", false);
                    $("#email").attr("disabled", false);
                }
            },
        });
    });

    // email live checking exist or not
    $("#email").keyup(function(e) {
        let id = $("#user_id").val();
        let td_email = $("#" + id)
            .children("td[data-target=email]")
            .text();
        let email = $("#email").val();
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkEmail: 1,
                email: email,
                check_id: id,
            },
            success: function(data) {
                if (data != "0" && email != td_email) {
                    $(".email_error").html(
                        "<span class='text-danger'>Email already taken!</span>"
                    );
                    $("#update_user").attr("disabled", true);
                } else {
                    $(".email_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#update_user").attr("disabled", false);
                }
            },
        });
    });

    $("#update_user").click(function(e) {
        e.preventDefault();

        // Get data from input fields and update
        let id = $("#user_id").val();
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let username = $("#username").val();
        let email = $("#email").val();
        let contact_no = $("#contact_no").val();

        let role_as = $("#role_select").find(":selected").val();

        // Checking fields empty or not
        if (
            id == "" ||
            fname == "" ||
            lname == "" ||
            username == "" ||
            email == "" ||
            contact_no == ""
        ) {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");
        } else {
            let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if (pattern.test(email)) {
                $.ajax({
                    url: RequestURL,
                    method: "POST",
                    data: {
                        fname: fname,
                        lname: lname,
                        username: username,
                        email: email,
                        contact_no: contact_no,
                        id: id,
                        role_as: role_as,
                    },
                    success: function(response) {
                        $("#" + id)
                            .children("td[data-target=fname]")
                            .text(fname);
                        $("#" + id)
                            .children("td[data-target=lname]")
                            .text(lname);
                        $("#" + id)
                            .children("td[data-target=username]")
                            .text(username);
                        $("#" + id)
                            .children("td[data-target=email]")
                            .text(email);
                        $("#" + id)
                            .children("td[data-target=contact_no]")
                            .text(contact_no);
                        $("#" + id)
                            .children("td[data-target=contact_no]")
                            .text(contact_no);

                        if (role_as == 1) {
                            $("#" + id)
                                .children("td[data-target=role_as]")
                                .text("Admin");
                        } else if (role_as == 0) {
                            $("#" + id)
                                .children("td[data-target=role_as]")
                                .text("User");
                        }

                        // Messsage Show
                        showMessage();
                        $(".message_show .ation_message").html(response);

                        $("#role_select").html(
                            '\
                            <option value="" class="option_1"></option>\
                            <option value="" class="option_2"></option>\
                            '
                        );
                        $("#staticBackdrop").modal("toggle");
                    },
                });
            } else {
                $("#alertBox").modal("show");
                $(".alertMessage").html("Oops! Not a valid email address!");
            }
        }
    });
});
// });

// view data in modal
$(document).on("click", "span[data-role=view]", function() {
    let id = $(this).data("id");

    let username = $("#" + id)
        .children("td[data-target=username]")
        .text();
    $("#view_modal_img").attr("src", "../uploaded_img/" + username + ".jpg");

    // fetching data in table td

    $("#view_fname").text(
        $("#" + id)
        .children("td[data-target=fname]")
        .text()
    );
    $("#view_lname").text(
        $("#" + id)
        .children("td[data-target=lname]")
        .text()
    );
    $("#view_username").text(
        $("#" + id)
        .children("td[data-target=username]")
        .text()
    );
    $("#view_email").text(
        $("#" + id)
        .children("td[data-target=email]")
        .text()
    );
    $("#view_contact").text(
        $("#" + id)
        .children("td[data-target=contact_no]")
        .text()
    );
    $("#view_role").text(
        $("#" + id)
        .children("td[data-target=role_as]")
        .text()
    );
});

// Delete user code starts here
$(document).on("click", "span[data-role=delete]", function() {
    $("#confirmBox").modal("show");
    let id = $(this).data("id");
    modalDismiss();

    let username = $("#" + id)
        .children("td[data-target=username]")
        .text();

    let role = $.trim(
        $("#" + id)
        .children("td[data-target=role_as]")
        .text()
    );

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: { delete_id: id },
            success: function(response) {
                // Hide Row
                $("#" + id).hide();

                // Message Show
                showMessage();
                if (role == "Admin") {
                    $(".message_show .ation_message").html(
                        "Admin deleted successfully..."
                    );
                } else {
                    $(".message_show .ation_message").html(
                        "User deleted successfully..."
                    );
                }
            },
        });
        $("#confirmBox").modal("toggle");
    });
});
// Delete user code starts here

// Update Home Section Starts Here
$(".edit_home_btn").click(function(e) {
    e.preventDefault();
    let home_fname = $.trim($(".home_fname").text());
    let home_lname = $.trim($(".home_lname").text());
    let home_occu = $.trim($(".home_occu").text());
    let home_desc = $.trim($(".home_desc").text());
    let home_img = $(".home_img img").attr("src");

    // Fetch data in form
    $("#home_fname").val(home_fname);
    $("#home_lname").val(home_lname);
    $("#home_occu").val(home_occu);
    $("#home_desc").val(home_desc);
    $(".home_modal_img").attr("src", home_img);

    $("#update_home_btn").click(function(e) {
        e.preventDefault();

        let home_fname = $("#home_fname").val();
        let home_lname = $("#home_lname").val();
        let home_occu = $("#home_occu").val();
        let home_desc = $("#home_desc").val();
        if (
            home_fname == "" ||
            home_lname == "" ||
            home_occu == "" ||
            home_desc == ""
        ) {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");
        } else {
            let home_form = document.getElementById("update_home_form");

            $.ajax({
                url: RequestURL,
                type: "POST",
                // dataType: "json",
                data: new FormData(home_form),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // console.log("Wait..Data is loading...");
                },
                success: function(response) {
                    // hide modal
                    $("#edit_home_modal").modal("toggle");

                    // reset form
                    // $("#update_home_form")[0].reset();

                    // Refresh Table Data
                    $("#home_content").load(location.href + " #home_content>*", "");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
                error: function(request, error) {
                    console.log(arguments);
                    console.log("Error: " + error);
                },
            });
        }
    });
});
// Update Home Section Ends Here

// Update About Section Starts Here
$(".edit_about_btn").click(function(e) {
    e.preventDefault();

    $(".about_modal_img").attr("src", $(".about_img img").attr("src"));

    $("#update_about_btn").click(function(e) {
        e.preventDefault();

        let about_title = $("#about_title").val();
        let about_desc = $("#about_desc").val();
        let experience = $("#experience").find(":selected").val();
        if (about_title == "" || about_desc == "") {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");
        } else {
            let about_form = document.getElementById("update_about_form");

            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(about_form),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    console.log("Wait..Data is loading...");
                },
                success: function(response) {
                    // hide modal
                    $("#edit_about_modal").modal("toggle");

                    // reset form
                    // $("#update_about_form")[0].reset();

                    // Refresh Table Data
                    $("#about_content").load(location.href + " #about_content>*", "");

                    // Messsage Show
                    // showMessage();
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
                error: function(request, error) {
                    console.log(arguments);
                    console.log("Error: " + error);
                },
            });
        }
    });
});

// Add Skill
$("#add_skill_btn").click(function(e) {
    e.preventDefault();
    let skillName = $("#add_skill_name").val();
    let skillPercentage = $("#add_skill_percentage").val();
    let skillProgessColor = $("input[name='add_skill_color']:checked").val();

    if (skillName == "" || skillPercentage == "") {
        emptyAlert();
    } else {
        let add_skill_form = document.getElementById("add_skill_form");

        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                add_skill: 1,
                skillName: skillName,
                skillPercentage: skillPercentage,
                skillProgessColor: skillProgessColor,
            },
            beforeSend: function() {
                console.log("Wait..Data is loading...");
            },
            success: function(response) {
                // hide modal
                $("#add_skill_modal").modal("toggle");

                // reset form
                // $("#update_about_form")[0].reset();

                // Refresh Table Data
                // $("#about_content").load(location.href + " #about_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Edit Skill
$(document).on("click", ".edit_skill_btn", function(e) {
    e.preventDefault();

    let skill_id = $(this).data("id");
    modalDismiss();

    // Storing data by id
    let skill_name = $("#" + skill_id + " #skill_name").text(); //
    let skill_percentage = $("#" + skill_id + " #skill_percentage").text(); //
    let skill_color = $("#" + skill_id)
        .data("color")
        .toLowerCase();

    // Fetching data in update modal input
    $("#edit_skill_name").val(skill_name);
    $("#edit_skill_percentage").val(skill_percentage);

    // If skill color == radio button color then select that radio button
    let progress_color1 = $("#edit_progress_color1").val().toLowerCase();

    let progress_color2 = $("#edit_progress_color2").val().toLowerCase();

    let progress_color3 = $("#edit_progress_color3").val().toLowerCase();

    let progress_color4 = $("#edit_progress_color4").val().toLowerCase();

    if (progress_color1 == skill_color) {
        $("#edit_progress_color1").prop("checked", true);
    } else if (progress_color2 == skill_color) {
        $("#edit_progress_color2").prop("checked", true);
    } else if (progress_color3 == skill_color) {
        $("#edit_progress_color3").prop("checked", true);
    } else if (progress_color4 == skill_color) {
        $("#edit_progress_color4").prop("checked", true);
    }

    $("#update_skill_btn").click(function(e) {
        e.preventDefault();

        // Get data from input fields
        let skill_name = $("#edit_skill_name").val();
        let skill_percentage = $("#edit_skill_percentage").val();
        let skill_color = $("input[name='edit_skill_color']:checked").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_skill: 1,
                skill_id: skill_id,
                skill_name: skill_name,
                skill_percentage: skill_percentage,
                skill_color: skill_color,
            },
            success: function(response) {
                // hide modal
                $("#edit_skill_modal").modal("toggle");

                // Refresh Skill Content
                $("#about_content").load(location.href + " #about_content>*", "");
                $("#view_all_skills").load(location.href + " #view_all_skills>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});

// Delete Skill
$(document).on("click", ".delete_skill_btn", function(e) {
    $("#confirmBox").modal("show");
    let skill_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_skill: 1,
                skill_id: skill_id,
            },
            success: function(response) {
                // hide modal
                $("#confirmBox").modal("toggle");

                // Refresh Skill Content
                $("#about_content").load(location.href + " #about_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
                $("#view_all_skills").load(location.href + " #view_all_skills>*", "");
            },
        });
    });
});
// Update About Section Ends Here

// Service Section Starts Here

// Update service content
$("#update_service_content_btn").click(function(e) {
    e.preventDefault();

    let service_title = $("#service_title").val();
    let service_desc = $("#service_desc").val();

    if (service_title == "" || service_desc == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_service_content: 1,
                service_title: service_title,
                service_desc: service_desc,
            },
            success: function(response) {
                // hide modal
                $("#edit_service_content_modal").modal("toggle");

                // Refresh Service Content
                $("#service_content").load(location.href + " #service_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Add Service Starts Here
$("#add_service").click(function(e) {
    e.preventDefault();

    $("#code").text('<i class="fa-brands fa-html5"></i>');

    // Check service already exists or not for add service
    $("#add_service_name").keyup(function(e) {
        let service_name = $("#add_service_name").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkAddServiceName: 1,
                add_service_name: service_name,
            },

            success: function(response) {
                if (response != "0") {
                    $(".add_service_error").html(
                        "<span class='text-danger'>Service name already taken!</span>"
                    );
                    $("#add_service_btn").attr("disabled", true);
                } else {
                    $(".add_service_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_service_btn").attr("disabled", false);
                }
            },
        });
    });

    // Check service icon valid or not for add service
    $("#add_service_icon").keyup(function(e) {
        let service_icon = $("#add_service_icon").val();

        let condition1 = service_icon.includes('<i class="');
        let condition2 = service_icon.includes('"></i>');

        if (!(condition1 && condition2)) {
            $(".add_service_icon_error").html(
                "<span class='text-danger'>Not valid fontawesome icon</span>"
            );
            $("#add_service_btn").attr("disabled", true);
        } else {
            $(".add_service_icon_error").html(
                "<span class='text-success'>Valid icon</span>"
            );
            $("#add_service_btn").attr("disabled", false);
        }
    });

    $("#add_service_btn").click(function(e) {
        e.preventDefault();

        let service_name = $("#add_service_name").val();
        let service_icon = $("#add_service_icon").val();

        if (service_name == "" || service_icon == "") {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");
        } else {
            $.ajax({
                type: "POST",
                url: RequestURL,
                data: {
                    add_service: 1,
                    service_name: service_name,
                    service_icon: service_icon,
                },
                success: function(response) {
                    // hide modal
                    $("#add_service_modal").modal("toggle");

                    // Refresh Services
                    $("#service_items").load(location.href + " #service_items>*", "");
                    // Refresh form
                    $("#add_service_modal").load(
                        location.href + " #add_service_modal>*",
                        ""
                    );

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
            });
        }
    });
});

// // Add Service Ends Here

// Edit service start here
// $("#edit_service_btn").click(function(e) {
$(document).on("click", "#edit_service_btn", function(e) {
    e.preventDefault();

    let service_id = $(this).data("id");
    $("#editCodeSample").text('<i class="fa-brands fa-html5"></i>');
    modalDismiss();

    // Get data from table td
    let td_service_name = $.trim(
        $("#" + service_id)
        .children("td[data-target=service_name]")
        .text()
    );
    let td_service_icon = $.trim(
        $("#" + service_id)
        .children("td[data-target=service_icon]")
        .html()
    );

    // Show data in form
    $("#edit_service_name").val(td_service_name);
    $("#edit_service_icon").val(td_service_icon);

    // Get data from input fields
    let service_name = $("#edit_service_name").val();
    let service_icon = $("#edit_service_icon").val();

    // Check service already exists or not for edit service
    $("#edit_service_name").keyup(function(e) {
        let service_name = $("#edit_service_name").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkEditServiceName: 1,
                edit_service_name: service_name,
            },

            success: function(response) {
                if (
                    response != "0" &&
                    service_name.toLowerCase() != td_service_name.toLowerCase()
                ) {
                    $(".edit_service_error").html(
                        "<span class='text-danger'>Service name already taken!</span>"
                    );
                    $("#update_service_btn").attr("disabled", true);
                    $("#edit_service_icon").attr("disabled", true);
                } else if (service_name == "") {
                    $(".edit_service_error").html(
                        "<span class='text-danger'>Couldn't be empty</span>"
                    );
                    $("#update_service_btn").attr("disabled", true);
                    $("#edit_service_icon").attr("disabled", true);
                } else {
                    $(".edit_service_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#update_service_btn").attr("disabled", false);
                    $("#edit_service_icon").attr("disabled", false);
                }
            },
        });
    });

    // Check service icon valid or not for edit service
    $("#edit_service_icon").keyup(function(e) {
        let service_icon = $("#edit_service_icon").val();

        let condition1 = service_icon.includes('<i class="');
        let condition2 = service_icon.includes('"></i>');

        if (!(condition1 && condition2)) {
            $(".edit_service_icon_error").html(
                "<span class='text-danger'>Not valid fontawesome icon</span>"
            );
            $("#update_service_btn").attr("disabled", true);
            $("#edit_service_name").attr("disabled", true);
        } else if (service_icon == "") {
            $(".edit_service_error").html(
                "<span class='text-danger'>Couldn't be empty</span>"
            );
            $("#update_service_btn").attr("disabled", true);
            $("#edit_service_name").attr("disabled", true);
        } else {
            $(".edit_service_icon_error").html(
                "<span class='text-success'>Valid icon</span>"
            );
            $("#update_service_btn").attr("disabled", false);
            $("#edit_service_name").attr("disabled", false);
        }
    });

    $("#update_service_btn").click(function(e) {
        e.preventDefault();
        let service_name = $("#edit_service_name").val();
        let service_icon = $("#edit_service_icon").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_service: 1,
                service_id: service_id,
                service_name: service_name,
                service_icon: service_icon,
            },
            success: function(response) {
                // hide modal
                $("#edit_service_modal").modal("toggle");

                // Refresh Skill Content
                $("#service_items").load(location.href + " #service_items>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});
// });
// Edit service end here

// Delete service starts here
$(document).on("click", "#delete_service_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let service_delete_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_service: 1,
                service_delete_id: service_delete_id,
            },
            success: function(response) {
                // hide modal
                $("#confirmBox").modal("toggle");

                // Refresh Services
                $("#service_items").load(location.href + " #service_items>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});
// Delete service end here

// Service Section Ends Here

// Achievements Section Starts Here
// Achivements counter

function animCounter() {
    setTimeout(function() {
        let counters = document.querySelectorAll(".counter");
        let time = 300;

        counters.forEach((counter) => {
            let updateCount = () => {
                let target = counter.getAttribute("data-target");
                let count = +counter.innerText;
                let increament = target / time;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increament);
                    setTimeout(updateCount, 70);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    }, 700);
}

animCounter();

// Update all achievements
$(document).on("click", "#update_achivements", function(e) {
    e.preventDefault();

    let clients_all = $("#clients").val();
    let projects_all = $("#projects").val();
    let awards_all = $("#awards").val();
    let experience_all = $("#experience").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_achievements: 1,
            clients_all: clients_all,
            projects_all: projects_all,
            awards_all: awards_all,
            experience_all: experience_all,
        },
        success: function(response) {
            // hide modal
            $("#edit_all_achive_modal").modal("toggle");

            // Refresh Services
            $("#achievements_content").load(
                location.href + " #achievements_content>*",
                ""
            );

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        },
    });
});

// Update total clients
$(document).on("click", "#update_clients", function(e) {
    e.preventDefault();

    let clients_total = $("#clients_total").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_clients: 1,
            clients_total: clients_total,
        },
        success: function(response) {
            // hide modal
            $("#edit_total_clients_modal").modal("toggle");

            // Refresh Services
            $("#achievements_content").load(
                location.href + " #achievements_content>*",
                ""
            );

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        },
    });
});

// Update total projects
$(document).on("click", "#update_projects", function(e) {
    e.preventDefault();

    let projects_total = $("#projects_total").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_projects: 1,
            projects_total: projects_total,
        },
        success: function(response) {
            // hide modal
            $("#edit_total_projects_modal").modal("toggle");

            // Refresh Services
            $("#achievements_content").load(
                location.href + " #achievements_content>*",
                ""
            );

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        },
    });
});

// Update total awards
$(document).on("click", "#update_awards", function(e) {
    e.preventDefault();

    let awards_total = $("#awards_total").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_awards: 1,
            awards_total: awards_total,
        },
        success: function(response) {
            // hide modal
            $("#edit_total_awards_modal").modal("toggle");

            // Refresh Services
            $("#achievements_content").load(
                location.href + " #achievements_content>*",
                ""
            );

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        },
    });
});

// Update experience
$(document).on("click", "#update_experience", function(e) {
    e.preventDefault();

    let experience_total = $("#experience_total").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_experience: 1,
            experience_total: experience_total,
        },
        success: function(response) {
            // hide modal
            $("#edit_experience_modal").modal("toggle");

            // Refresh Services
            $("#achievements_content").load(
                location.href + " #achievements_content>*",
                ""
            );

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        },
    });
});
// Achievements Section Ends Here

// Portfolio Section Starts Here

// Update portfolio content
$("#update_portfolio_content_btn").click(function(e) {
    e.preventDefault();

    let portfolio_title = $("#portfolio_title").val();
    let portfolio_desc = $("#portfolio_desc").val();

    if (portfolio_title == "" || portfolio_desc == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_portfolio_content: 1,
                portfolio_title: portfolio_title,
                portfolio_desc: portfolio_desc,
            },
            success: function(response) {
                // hide modal
                $("#edit_portfolio_content_modal").modal("toggle");

                // Refresh Portfolio Content
                $("#portfolio_content").load(
                    location.href + " #portfolio_content>*",
                    ""
                );

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Add Portfolio Category
// check portfolio category exists or not
$("#port_cat_name").keyup(function(e) {
    let port_cat_name = $("#port_cat_name").val();

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            checkPortCat: 1,
            port_cat_name: port_cat_name,
        },
        success: function(data) {
            if (data != "0") {
                $(".add_cat_error").html(
                    "<span class='text-danger'>Username already taken!</span>"
                );
                $("#add_portfolio_category_btn").attr("disabled", true);
            } else {
                $(".add_cat_error").html(
                    "<span class='text-success'>It's available</span>"
                );
                $("#add_portfolio_category_btn").attr("disabled", false);
            }
        },
    });
});

// Insert Portfolio Category
$("#add_portfolio_category_btn").click(function(e) {
    e.preventDefault();

    let port_cat_name = $("#port_cat_name").val();
    let port_cat_status =
        $("#port_cat_status").is(":checked") == true ? "1" : "0";

    if (port_cat_name == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                addPortfolioCategory: 1,
                port_cat_name: port_cat_name,
                port_cat_status: port_cat_status,
            },
            success: function(response) {
                // hide modal
                $("#add_portfolio_cotegory_modal").modal("toggle");

                // refresh modal
                $("#add_portfolio_cotegory_modal").load(
                    location.href + " #add_portfolio_cotegory_modal>*",
                    ""
                );

                // Refresh Portfolio Content
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Update Portfolio Category
$(document).on("click", "#edit_port_cat_btn", function(e) {
    e.preventDefault();

    modalDismiss();

    let port_cat_id = $(this).data("id");
    let td_port_cat_name = $.trim(
        $("#" + port_cat_id)
        .children("td[data-target=port_cat_name]")
        .text()
    );
    let port_cat_status = $.trim(
        $("#" + port_cat_id)
        .children("td[data-target=port_cat_status]")
        .text()
    );

    // Show data in modal input
    $("#edit_port_cat_name").val(td_port_cat_name);

    if (port_cat_status == "Visible") {
        $("#edit_port_cat_status").attr("checked", true);
    } else {
        $("#edit_port_cat_status").attr("checked", false);
    }

    // Check portfolio name exist or not for edit Portfolio category
    $("#edit_port_cat_name").keyup(function(e) {
        let port_cat_name = $("#edit_port_cat_name").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkEditPortCat: 1,
                port_cat_name: port_cat_name,
            },
            success: function(data) {
                if (
                    data != "0" &&
                    port_cat_name.toLowerCase() != td_port_cat_name.toLowerCase()
                ) {
                    $(".edit_cat_error").html(
                        "<span class='text-danger'>Username already taken!</span>"
                    );
                    $("#update_portfolio_category_btn").attr("disabled", true);
                } else if (port_cat_name == "") {
                    $(".edit_cat_error").html(
                        "<span class='text-danger'>Couldn't be empty</span>"
                    );
                    $("#update_portfolio_category_btn").attr("disabled", true);
                } else {
                    $(".edit_cat_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#update_portfolio_category_btn").attr("disabled", false);
                }
            },
        });
    });

    $("#update_portfolio_category_btn").click(function(e) {
        e.preventDefault();

        let port_cat_name = $("#edit_port_cat_name").val();
        let port_cat_status =
            $("#edit_port_cat_status").is(":checked") == true ? "1" : "0";

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_portfolio_category: 1,
                port_cat_id: port_cat_id,
                port_cat_name: port_cat_name,
                port_cat_status: port_cat_status,
            },
            success: function(response) {
                // hide modal
                $("#edit_portfolio_cotegory_modal").modal("toggle");

                // Refresh Portfolio Content
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});

// Delete Portfolio Category
$(document).on("click", "#delete_port_cat_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let delete_port_cat_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_port_cat: 1,
                delete_port_cat_id: delete_port_cat_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Refresh Portfolio Content
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});

// Add Porfolio
$(document).on("submit", "#add_portfolio_form", function(e) {
    e.preventDefault();

    let port_name = $("#port_name").val();
    let port_technology = $("#port_technology").val();
    let port_url = $("#port_url").val();
    // let port_category = $("#port_cat :selected").val() == "" ? 'Uncategorized' : $("#port_cat :selected").val();
    let port_description = $("#port_description").val();

    let port_image = $("#port_image").get(0).files.length === 0;

    if (
        port_name == "" ||
        port_technology == "" ||
        port_url == "" ||
        port_description == "" ||
        port_image
    ) {
        emptyAlert();
    } else {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                // hide modal
                $("#add_portfolio_modal").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Form
                $("#add_portfolio_form")[0].reset();

                // Refresh Table
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );
                $("#portfolio_items").load(location.href + " #portfolio_items>*", "");
            },
        });
    }
});

// View Portfolio
$(document).on("click", "#view_portfolio_btn", function() {
    let portfolio_id = $(this).data("id");
    let portfolio_image = $("#" + portfolio_id + "view_image").attr("src");

    $("#view_port_img_modal").attr("src", portfolio_image);

    // Storing data from td
    let portfolio_name = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_name]")
        .text()
    );
    let portfolio_technology = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_technology]")
        .text()
    );
    let portfolio_description = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_description]")
        .text()
    );
    let portfolio_url = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_url]")
        .text()
    );
    let portfolio_category = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_category]")
        .text()
    );

    // Show data dynamically in modal
    $("#view_port_name").text(portfolio_name);
    $("#view_port_technology").text(portfolio_technology);
    $("#view_port_description").text(portfolio_description);
    $("#view_port_url a").text(portfolio_url);
    $("#view_port_url a").attr("href", portfolio_url);
    $("#view_port_img_modal_url").attr("href", portfolio_url);
    $("#view_port_category").text(portfolio_category);
});

// Edit Portfolio
$(document).on("click", "#edit_portfolio_btn", function(e) {
    e.preventDefault();

    let portfolio_id = $(this).data("id");
    modalDismiss();

    // Storing data from td
    let portfolio_name = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_name]")
        .text()
    );
    let portfolio_technology = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_technology]")
        .text()
    );
    let portfolio_description = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_description]")
        .text()
    );
    let portfolio_url = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_url]")
        .text()
    );
    let portfolio_category = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_category]")
        .text()
    );

    // Showing data in input field
    $("#edit_port_id").val(portfolio_id);

    $("#edit_port_name").val(portfolio_name);
    $("#edit_port_technology").val(portfolio_technology);
    $("#edit_port_description").val(portfolio_description);
    $("#edit_port_url").val(portfolio_url);

    // Select option by category
    let port_cat_option = document.querySelectorAll("#edit_port_category option");
    port_cat_option.forEach((options) => {
        let port_option = options.value;

        if (port_option == portfolio_category) {
            options.setAttribute("selected", true);
        }
    });

    $(document).on("submit", "#edit_portfolio_form", function(e) {
        e.preventDefault();

        $.ajax({
            url: RequestURL,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                // hide modal
                $("#edit_portfolio_modal").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Form
                $("#edit_portfolio_form")[0].reset();

                // Refresh Table
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );
                $("#portfolio_items").load(location.href + " #portfolio_items>*", "");
            },
        });
    });
});

// Delete Portfolio
$(document).on("click", "#delete_portfolio_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let portfolio_id = $(this).data("id");
    modalDismiss();

    let portfolio_category = $.trim(
        $("." + portfolio_id)
        .children("td[data-target=portfolio_category]")
        .text()
    );

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_portfolio: 1,
                portfolio_id: portfolio_id,
                portfolio_category: portfolio_category,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Table
                $("#portfolio_category").load(
                    location.href + " #portfolio_category>*",
                    ""
                );
                $("#portfolio_items").load(location.href + " #portfolio_items>*", "");
            },
        });
    });
});

// Portfolio Section Ends Here

// Project Section Starts Here
// Update project content
$("#update_project_content_btn").click(function(e) {
    e.preventDefault();

    let project_title = $("#project_title").val();
    let project_desc = $("#project_desc").val();

    if (project_title == "" || project_desc == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_project_content: 1,
                project_title: project_title,
                project_desc: project_desc,
            },
            success: function(response) {
                // hide modal
                $("#edit_project_content_modal").modal("toggle");

                // Refresh project Content
                $("#project_content").load(location.href + " #project_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Add Project Category
$(document).on("click", "#add_project_category", function(e) {
    // check project category exists or not
    $("#project_cat_name").keyup(function(e) {
        let project_cat_name = $("#project_cat_name").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkProjectCat: 1,
                project_cat_name: project_cat_name,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_cat_error").html(
                        "<span class='text-danger'>Category already taken!</span>"
                    );
                    $("#add_project_post_btn").attr("disabled", true);
                } else {
                    $(".add_cat_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_project_post_btn").attr("disabled", false);
                }
            },
        });
    });

    // check project slug exists or not
    $("#project_cat_slug").keyup(function(e) {
        let project_cat_slug = $("#project_cat_slug").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkProjectCatSlug: 1,
                project_cat_slug: project_cat_slug,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_cat_slug_error").html(
                        "<span class='text-danger'>Slug already taken!</span>"
                    );
                    $("#add_project_category_btn").attr("disabled", true);
                } else {
                    $(".add_cat_slug_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_project_category_btn").attr("disabled", false);
                }
            },
        });
    });

    // Insert Project Category
    $("#add_project_category_btn").click(function(e) {
        e.preventDefault();

        let project_cat_name = $("#project_cat_name").val();
        let project_cat_slug = $("#project_cat_slug").val();
        let project_cat_description = $("#project_cat_description").val();
        let project_cat_meta_title = $("#project_cat_meta_title").val();
        let project_cat_meta_description = $("#project_cat_meta_description").val();
        let project_cat_meta_keywords = $("#project_cat_meta_keywords").val();
        let project_cat_status =
            $("#project_cat_status").is(":checked") == true ? "1" : "0";

        if (
            project_cat_name == "" ||
            project_cat_slug == "" ||
            project_cat_description == "" ||
            project_cat_meta_title == "" ||
            project_cat_meta_description == "" ||
            project_cat_meta_keywords == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                type: "POST",
                url: RequestURL,
                data: {
                    addProjectCategory: 1,
                    project_cat_name: project_cat_name,
                    project_cat_slug: project_cat_slug,
                    project_cat_description: project_cat_description,
                    project_cat_meta_title: project_cat_meta_title,
                    project_cat_meta_description: project_cat_meta_description,
                    project_cat_meta_keywords: project_cat_meta_keywords,
                    project_cat_status: project_cat_status,
                },
                success: function(response) {
                    // hide modal
                    $("#add_project_cotegory_modal").modal("toggle");

                    // refresh modal
                    $("#add_project_cotegory_modal").load(
                        location.href + " #add_project_cotegory_modal>*",
                        ""
                    );

                    // Refresh Project Content
                    $("#project_category").load(
                        location.href + " #project_category>*",
                        ""
                    );

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
            });
        }
    });
});

// Update Project Category
$(document).on("click", "#edit_project_cat_btn", function(e) {
    e.preventDefault();

    modalDismiss();

    let project_cat_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getProjectCatData: 1,
            project_cat_id: project_cat_id,
        },
        success: function(category) {
            $("#edit_project_cat_name").val(category.name);
            $("#edit_project_cat_slug").val(category.slug);
            $("#edit_project_cat_description").val(category.description);
            $("#edit_project_cat_meta_title").val(category.meta_title);
            $("#edit_project_cat_meta_description").val(category.meta_description);
            $("#edit_project_cat_meta_keywords").val(category.meta_keywords);

            category.status == 1 ?
                $("#edit_project_cat_status").prop("checked", true) :
                $("#edit_project_cat_status").prop("checked", false);

            // Check project category name exist or not
            $("#edit_project_cat_name").keyup(function(e) {
                let edit_project_cat_name = $.trim($("#edit_project_cat_name").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditProjectCat: 1,
                        edit_project_cat_name: edit_project_cat_name,
                    },
                    success: function(data) {
                        if (
                            data != "0" &&
                            edit_project_cat_name.toLowerCase() != category.name.toLowerCase()
                        ) {
                            $(".edit_cat_error").html(
                                "<span class='text-danger'>Category already taken!</span>"
                            );
                            $("#edit_project_cat_slug").attr("disabled", true);
                            $("#update_project_category_btn").attr("disabled", true);
                        } else {
                            $(".edit_cat_error").html(
                                "<span class='text-success'>It's available</span>"
                            );
                            $("#edit_project_cat_slug").attr("disabled", false);
                            $("#update_project_category_btn").attr("disabled", false);
                        }
                    },
                });
            });

            // Check project category slug exist or not
            $("#edit_project_cat_slug").keyup(function(e) {
                let edit_project_cat_slug = $.trim($("#edit_project_cat_slug").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditProjectCatSlug: 1,
                        edit_project_cat_slug: edit_project_cat_slug,
                    },
                    success: function(data) {
                        let slug = edit_project_cat_slug.replace(/[^A-Za-z0-9\-]+/g, "-");

                        if (
                            data != "0" &&
                            slug.toLowerCase() != category.slug.toLowerCase()
                        ) {
                            $(".edit_cat_slug_error").html(
                                "<span class='text-danger'>Slug already taken!</span>"
                            );
                            $("#edit_project_cat_name").attr("disabled", true);
                            $("#update_project_category_btn").attr("disabled", true);
                        } else {
                            $(".edit_cat_slug_error").html(
                                "<span class='text-success'>It's available</span>"
                            );
                            $("#edit_project_cat_name").attr("disabled", false);
                            $("#update_project_category_btn").attr("disabled", false);
                        }
                    },
                });
            });
        },
    });

    // update category
    $("#update_project_category_btn").click(function(e) {
        e.preventDefault();

        let name = $("#edit_project_cat_name").val();
        let slug = $("#edit_project_cat_slug").val();
        let description = $("#edit_project_cat_description").val();
        let meta_title = $("#edit_project_cat_meta_title").val();
        let meta_description = $("#edit_project_cat_meta_description").val();
        let meta_keywords = $("#edit_project_cat_meta_keywords").val();
        let status =
            $("#edit_project_cat_status").is(":checked") == true ? "1" : "0";

        if (
            name == "" ||
            slug == "" ||
            description == "" ||
            meta_title == "" ||
            meta_description == "" ||
            meta_keywords == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                type: "POST",
                url: RequestURL,
                data: {
                    updateProjectCategory: 1,
                    edit_project_cat_id: project_cat_id,
                    edit_project_cat_name: name,
                    edit_project_cat_slug: slug,
                    edit_project_cat_description: description,
                    edit_project_cat_meta_title: meta_title,
                    edit_project_cat_meta_description: meta_description,
                    edit_project_cat_meta_keywords: meta_keywords,
                    edit_project_cat_status: status,
                },
                success: function(response) {
                    // hide modal
                    $("#edit_project_cotegory_modal").modal("toggle");

                    // Refresh Project Content
                    $("#project_category").load(
                        location.href + " #project_category>*",
                        ""
                    );

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
            });
        }
        project_cat_id = "";
    });
});

// Delete Project Category
$(document).on("click", "#delete_project_cat_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let delete_project_cat_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_project_cat: 1,
                delete_project_cat_id: delete_project_cat_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Refresh Portfolio Content
                $("#project_category").load(location.href + " #project_category>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});


// Add Project Post
$(document).on("click", "#add_project_post", function(e) {
    e.preventDefault();

    // check post slug exists or not
    $("#add_post_slug").keyup(function(e) {
        let slug = $("#add_post_slug").val();
        let add_project_post_slug = slug.replace(/[^A-Za-z0-9\-]+/g, "-");

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkAddProjectPostSlug: 1,
                add_project_post_slug: add_project_post_slug,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_post_slug_error").html(
                        "<span class='text-danger'>Slug already taken!!</span>"
                    );
                    $("#add_project_post_btn").attr("disabled", true);
                } else {
                    $(".add_post_slug_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_project_post_btn").attr("disabled", false);
                }
            },
        });
    });

    $(document).on("submit", "#add_project_post_form", function(e) {
        e.preventDefault();

        let post_title = $("#add_post_title").val();
        let post_slug = $("#add_post_slug").val();
        let post_description = $("#add_post_description").val();
        let post_meta_title = $("#add_post_meta_title").val();
        let post_meta_keywords = $("#add_post_meta_keywords").val();
        let post_meta_description = $("#add_post_meta_description").val();

        let post_image = $("#add_post_image").get(0).files.length === 0;

        // let post_html_code = $("#add_post_html_code").val();
        // let post_css_code = $("#add_post_css_code").val();
        // let post_js_code = $("#add_post_js_code").val();
        // let post_php_code = $("#add_post_php_code").val();

        if (
            post_title == "" ||
            post_slug == "" ||
            post_description == "" ||
            post_meta_title == "" ||
            post_meta_keywords == "" ||
            post_meta_description == "" ||
            post_image
        ) {
            emptyAlert();
        } else {
            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // hide modal
                    $("#add_project_post_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Form
                    $("#add_project_post_form")[0].reset();
                    $("#add_post_description").summernote("reset");

                    // Refresh Table
                    $("#project_category").load(location.href + " #project_category>*", "");
                    $("#project_posts").load(location.href + " #project_posts>*", "");
                },
            });
        }
    });
});


// View Project Post
$(document).on("click", "#view_project_post_btn", function(e) {
    e.preventDefault();

    let project_post_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getProjectPostView: 1,
            project_post_id: project_post_id,
        },
        success: function(data) {
            $("#view_post_image").attr("src", "../uploaded_img/" + data.image);

            $("#view_post_title").html(data.title);
            $("#view_post_slug").html(data.slug);
            $("#view_post_category").html(data.category);

            if (data.status == "1") {
                $("#view_post_status").html("Published");
            } else {
                $("#view_post_status").html("Unpublished");
            }

            $("#view_post_created_at").html(data.created_at);
            $("#view_post_meta_title").html(data.meta_title);
            $("#view_post_meta_keywords").html(data.meta_keywords);
            $("#view_post_meta_description").html(data.meta_description);
            $("#view_post_description").html(data.description);
        },
    });
});



// Update Project Post
$(document).on("click", "#edit_project_post_btn", function(e) {
    e.preventDefault();

    modalDismiss();

    let edit_project_post_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getProjectPostData: 1,
            edit_project_post_id: edit_project_post_id,
        },
        success: function(data) {
            $("#update_project_post_id").val(data.id);
            $("#edit_post_title").val(data.title);
            $("#edit_post_slug").val(data.slug);
            $("#edit_post_description").summernote("code", data.description);

            // Decode Entities function
            function decodeEntities(input) {
                var parser = new DOMParser().parseFromString(input, "text/html");

                return parser.documentElement.textContent;
            }

            $("#edit_post_html_code").val(decodeEntities(data.html_code));
            $("#edit_post_css_code").val(decodeEntities(data.css_code));
            $("#edit_post_js_code").val(decodeEntities(data.js_code));
            $("#edit_post_php_code").val(decodeEntities(data.php_code));

            $("#edit_post_meta_title").val(data.meta_title);
            $("#edit_post_meta_description").val(data.meta_description);
            $("#edit_post_meta_keywords").val(data.meta_keywords);

            // Select option by category
            let options = document.querySelectorAll("#edit_post_category option");
            options.forEach((element) => {
                let option = element.value;

                if (option == $("#edit_post_category").val(data.category)) {
                    element.setAttribute("selected", true);
                }
            });

            data.status == 1 ? $("#edit_post_status").prop("checked", true) : $("#edit_post_status").prop("checked", false);

            // Check project category slug exist or not
            $("#edit_post_slug").keyup(function(e) {
                let edit_project_post_slug = $.trim($("#edit_post_slug").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditProjectPostSlug: 1,
                        edit_project_post_slug: edit_project_post_slug,
                    },
                    success: function(response) {
                        let slug = edit_project_post_slug.replace(/[^A-Za-z0-9\-]+/g, "-");

                        if (
                            response != "0" &&
                            slug.toLowerCase() != data.slug.toLowerCase()
                        ) {
                            $(".edit_post_slug_error").html(
                                "<span class='text-danger'>Slug already taken!</span>"
                            );

                            $("#update_post_btn").attr("disabled", true);
                        } else {
                            $(".edit_post_slug_error").html(
                                "<span class='text-success'>It's available</span>"
                            );

                            $("#update_post_btn").attr("disabled", false);
                        }
                    },
                });
            });
        },
    });

    // update post
    $(document).on("submit", "#edit_project_post_form", function(e) {
        e.preventDefault();

        let post_title = $("#edit_post_title").val();
        let post_slug = $("#edit_post_slug").val();
        let post_description = $("#edit_post_description").val();
        let post_meta_title = $("#edit_post_meta_title").val();
        let post_meta_keywords = $("#edit_post_meta_keywords").val();
        let post_meta_description = $("#edit_post_meta_description").val();

        if (
            post_title == "" ||
            post_slug == "" ||
            post_description == "" ||
            post_meta_title == "" ||
            post_meta_keywords == "" ||
            post_meta_description == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // hide modal
                    $("#edit_project_post_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Form
                    $("#edit_project_post_form")[0].reset();

                    // Refresh Table
                    $("#project_category").load(location.href + " #project_category>*", "");
                    $("#project_posts").load(location.href + " #project_posts>*", "");
                },
            });
        }
    });
    edit_project_post_id = "";
});




// Delete Project Post
$(document).on("click", "#delete_project_post_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let delete_project_post_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_project_post: 1,
                delete_project_post_id: delete_project_post_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Refresh Table
                $("#project_category").load(location.href + " #project_category>*", "");
                $("#project_posts").load(location.href + " #project_posts>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});


// Project Section Ends Here

// Testimonials Section Starts Here
// Update Testimonial content
$("#update_testimonial_content_btn").click(function(e) {
    e.preventDefault();

    let testimonial_title = $("#testimonial_title").val();
    let testimonial_desc = $("#testimonial_desc").val();

    if (testimonial_title == "" || testimonial_desc == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_testimonial_content: 1,
                testimonial_title: testimonial_title,
                testimonial_desc: testimonial_desc,
            },
            success: function(response) {
                // hide modal
                $("#edit_testimonial_content_modal").modal("toggle");

                // Refresh Portfolio Content
                $("#testimonial_content").load(
                    location.href + " #testimonial_content>*",
                    ""
                );

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Add Testimonial
$(document).on("submit", "#add_testimonial_form", function(e) {
    e.preventDefault();

    let test_reviewer_name = $("#test_reviewer_name").val();
    let test_reviewer_title = $("#test_reviewer_title").val();
    let test_reviewer_comment = $("#test_reviewer_comment").val();

    let test_reviewer_image = $("#test_reviewer_image").get(0).files.length === 0;

    if (
        test_reviewer_name == "" ||
        test_reviewer_title == "" ||
        test_reviewer_comment == "" ||
        test_reviewer_image
    ) {
        emptyAlert();
    } else {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                // hide modal
                $("#add_testimonial_modal").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Form
                $("#add_testimonial_form")[0].reset();

                // Refresh Table
                $("#testimonial_items").load(
                    location.href + " #testimonial_items>*",
                    ""
                );
            },
        });
    }
});

// View Testimonial
$(document).on("click", "#view_testiomonial_btn", function() {
    let testimonial_id = $(this).data("id");
    let testimonial_image = $("#" + testimonial_id + "test_reviewer_image").attr(
        "src"
    );
    $("#view_test_img_modal").attr("src", testimonial_image);

    // Storing data from td
    let testimonial_name = $.trim(
        $("#" + testimonial_id)
        .children("td[data-target=test_reviewer_name]")
        .text()
    );
    let testimonial_title = $.trim(
        $("#" + testimonial_id)
        .children("td[data-target=test_reviewer_title]")
        .text()
    );
    let testimonial_comment = $("#" + testimonial_id + "full_comment").val();

    // Show data dynamically in modal
    $("#view_test_reviewer_name").text(testimonial_name);
    $("#view_test_reviewer_title").text(testimonial_title);
    $("#view_test_reviewer_comment").text(testimonial_comment);
});

// Edit Testimonial
$(document).on("click", "#edit_testimonial_btn", function(e) {
    e.preventDefault();

    let testimonial_id = $(this).data("id");
    modalDismiss();

    // Showing image in edit modal
    let testimonial_image = $("#" + testimonial_id + "test_reviewer_image").attr(
        "src"
    );
    $("#edit_view_test_img_modal").attr("src", testimonial_image);

    // Storing data from td
    let testimonial_name = $.trim(
        $("#" + testimonial_id)
        .children("td[data-target=test_reviewer_name]")
        .text()
    );
    let testimonial_title = $.trim(
        $("#" + testimonial_id)
        .children("td[data-target=test_reviewer_title]")
        .text()
    );
    let testimonial_comment = $("#" + testimonial_id + "full_comment").val();

    // Showing data in input field
    $("#edit_testimonial_id").val(testimonial_id);

    $("#edit_test_reviewer_name").val(testimonial_name);
    $("#edit_test_reviewer_title").val(testimonial_title);
    $("#edit_test_reviewer_comment").val(testimonial_comment);

    $(document).on("submit", "#edit_testimonial_form", function(e) {
        e.preventDefault();

        if (
            testimonial_name == "" ||
            testimonial_title == "" ||
            testimonial_comment == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // hide modal
                    $("#edit_testimonial_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Table
                    $("#testimonial_items").load(
                        location.href + " #testimonial_items>*",
                        ""
                    );
                    // Refresh Form
                    $("#edit_testimonial_form")[0].reset();
                },
            });
        }
    });
});

// Delete Testimonial
$(document).on("click", "#delete_testiomonial_btn", function(e) {
    e.preventDefault();

    let testimonial_id = $(this).data("id");
    $("#confirmBox").modal("show");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_testiomonial: 1,
                testimonial_id: testimonial_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Table
                $("#testimonial_items").load(
                    location.href + " #testimonial_items>*",
                    ""
                );
            },
        });
    });
});

// Testimonials Section Ends Here

// Hire Me Section Starts Here
$(document).on("submit", "#update_hire_me_form", function(e) {
    e.preventDefault();

    let hire_title = $("#hire_title").val();
    let hire_text = $("#hire_text").val();

    if (hire_title == "" || hire_text == "") {
        emptyAlert();
    } else {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                // hide modal
                $("#edit_hire_me_modal").modal("toggle");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);

                // Refresh Table
                $("#hire_me_content").load(location.href + " #hire_me_content>*", "");

                // Refresh Modal
                $("#edit_hire_me_modal").load(
                    location.href + " #edit_hire_me_modal>*",
                    ""
                );
            },
        });
    }
});
// Hire Me Section Ends Here

// Blog Section Starts Here
// Update blog content
$("#update_blog_content_btn").click(function(e) {
    e.preventDefault();

    let blog_title = $("#blog_title").val();
    let blog_desc = $("#blog_desc").val();

    if (blog_title == "" || blog_desc == "") {
        emptyAlert();
    } else {
        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                update_blog_content: 1,
                blog_title: blog_title,
                blog_desc: blog_desc,
            },
            success: function(response) {
                // hide modal
                $("#edit_blog_content_modal").modal("toggle");

                // Refresh blog Content
                $("#blog_content").load(location.href + " #blog_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    }
});

// Add Blog Category
$(document).on("click", "#add_blog_category", function(e) {
    // check blog category exists or not
    $("#blog_cat_name").keyup(function(e) {
        let blog_cat_name = $("#blog_cat_name").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkBlogCat: 1,
                blog_cat_name: blog_cat_name,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_cat_error").html(
                        "<span class='text-danger'>Category already taken!</span>"
                    );
                    $("#add_blog_post_btn").attr("disabled", true);
                } else {
                    $(".add_cat_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_blog_post_btn").attr("disabled", false);
                }
            },
        });
    });

    // check blog slug exists or not
    $("#blog_cat_slug").keyup(function(e) {
        let blog_cat_slug = $("#blog_cat_slug").val();

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkBlogCatSlug: 1,
                blog_cat_slug: blog_cat_slug,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_cat_slug_error").html(
                        "<span class='text-danger'>Slug already taken!</span>"
                    );
                    $("#add_blog_category_btn").attr("disabled", true);
                } else {
                    $(".add_cat_slug_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_blog_category_btn").attr("disabled", false);
                }
            },
        });
    });

    // Insert Blog Category
    $("#add_blog_category_btn").click(function(e) {
        e.preventDefault();

        let blog_cat_name = $("#blog_cat_name").val();
        let blog_cat_slug = $("#blog_cat_slug").val();
        let blog_cat_description = $("#blog_cat_description").val();
        let blog_cat_meta_title = $("#blog_cat_meta_title").val();
        let blog_cat_meta_description = $("#blog_cat_meta_description").val();
        let blog_cat_meta_keywords = $("#blog_cat_meta_keywords").val();
        let blog_cat_status =
            $("#blog_cat_status").is(":checked") == true ? "1" : "0";

        if (
            blog_cat_name == "" ||
            blog_cat_slug == "" ||
            blog_cat_description == "" ||
            blog_cat_meta_title == "" ||
            blog_cat_meta_description == "" ||
            blog_cat_meta_keywords == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                type: "POST",
                url: RequestURL,
                data: {
                    addblogCategory: 1,
                    blog_cat_name: blog_cat_name,
                    blog_cat_slug: blog_cat_slug,
                    blog_cat_description: blog_cat_description,
                    blog_cat_meta_title: blog_cat_meta_title,
                    blog_cat_meta_description: blog_cat_meta_description,
                    blog_cat_meta_keywords: blog_cat_meta_keywords,
                    blog_cat_status: blog_cat_status,
                },
                success: function(response) {
                    // hide modal
                    $("#add_blog_cotegory_modal").modal("toggle");

                    // refresh modal
                    $("#add_blog_cotegory_modal").load(
                        location.href + " #add_blog_cotegory_modal>*",
                        ""
                    );

                    // Refresh Blog Content
                    $("#blog_category").load(location.href + " #blog_category>*", "");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
            });
        }
    });
});

// Update Blog Category
$(document).on("click", "#edit_blog_cat_btn", function(e) {
    e.preventDefault();

    modalDismiss();

    let blog_cat_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getBlogCatData: 1,
            blog_cat_id: blog_cat_id,
        },
        success: function(category) {
            $("#edit_blog_cat_name").val(category.name);
            $("#edit_blog_cat_slug").val(category.slug);
            $("#edit_blog_cat_description").val(category.description);
            $("#edit_blog_cat_meta_title").val(category.meta_title);
            $("#edit_blog_cat_meta_description").val(category.meta_description);
            $("#edit_blog_cat_meta_keywords").val(category.meta_keywords);

            category.status == 1 ?
                $("#edit_blog_cat_status").prop("checked", true) :
                $("#edit_blog_cat_status").prop("checked", false);

            // Check blog category name exist or not
            $("#edit_blog_cat_name").keyup(function(e) {
                let edit_blog_cat_name = $.trim($("#edit_blog_cat_name").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditBlogCat: 1,
                        edit_blog_cat_name: edit_blog_cat_name,
                    },
                    success: function(data) {
                        if (
                            data != "0" &&
                            edit_blog_cat_name.toLowerCase() != category.name.toLowerCase()
                        ) {
                            $(".edit_cat_error").html(
                                "<span class='text-danger'>Category already taken!</span>"
                            );
                            $("#edit_blog_cat_slug").attr("disabled", true);
                            $("#update_blog_category_btn").attr("disabled", true);
                        } else {
                            $(".edit_cat_error").html(
                                "<span class='text-success'>It's available</span>"
                            );
                            $("#edit_blog_cat_slug").attr("disabled", false);
                            $("#update_blog_category_btn").attr("disabled", false);
                        }
                    },
                });
            });

            // Check blog category slug exist or not
            $("#edit_blog_cat_slug").keyup(function(e) {
                let edit_blog_cat_slug = $.trim($("#edit_blog_cat_slug").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditBlogCatSlug: 1,
                        edit_blog_cat_slug: edit_blog_cat_slug,
                    },
                    success: function(data) {
                        let slug = edit_blog_cat_slug.replace(/[^A-Za-z0-9\-]+/g, "-");

                        if (
                            data != "0" &&
                            slug.toLowerCase() != category.slug.toLowerCase()
                        ) {
                            $(".edit_cat_slug_error").html(
                                "<span class='text-danger'>Slug already taken!</span>"
                            );
                            $("#edit_blog_cat_name").attr("disabled", true);
                            $("#update_blog_category_btn").attr("disabled", true);
                        } else {
                            $(".edit_cat_slug_error").html(
                                "<span class='text-success'>It's available</span>"
                            );
                            $("#edit_blog_cat_name").attr("disabled", false);
                            $("#update_blog_category_btn").attr("disabled", false);
                        }
                    },
                });
            });
        },
    });

    // update category
    $("#update_blog_category_btn").click(function(e) {
        e.preventDefault();

        let name = $("#edit_blog_cat_name").val();
        let slug = $("#edit_blog_cat_slug").val();
        let description = $("#edit_blog_cat_description").val();
        let meta_title = $("#edit_blog_cat_meta_title").val();
        let meta_description = $("#edit_blog_cat_meta_description").val();
        let meta_keywords = $("#edit_blog_cat_meta_keywords").val();
        let status = $("#edit_blog_cat_status").is(":checked") == true ? "1" : "0";

        if (
            name == "" ||
            slug == "" ||
            description == "" ||
            meta_title == "" ||
            meta_description == "" ||
            meta_keywords == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                type: "POST",
                url: RequestURL,
                data: {
                    updateBlogCategory: 1,
                    edit_blog_cat_id: blog_cat_id,
                    edit_blog_cat_name: name,
                    edit_blog_cat_slug: slug,
                    edit_blog_cat_description: description,
                    edit_blog_cat_meta_title: meta_title,
                    edit_blog_cat_meta_description: meta_description,
                    edit_blog_cat_meta_keywords: meta_keywords,
                    edit_blog_cat_status: status,
                },
                success: function(response) {
                    // hide modal
                    $("#edit_blog_cotegory_modal").modal("toggle");

                    // Refresh Blog Content
                    $("#blog_category").load(location.href + " #blog_category>*", "");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                },
            });
        }
        blog_cat_id = "";
    });
});

// Delete Blog Category
$(document).on("click", "#delete_blog_cat_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let delete_blog_cat_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_blog_cat: 1,
                delete_blog_cat_id: delete_blog_cat_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Refresh Portfolio Content
                $("#blog_category").load(location.href + " #blog_category>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});

// Add Blog Post
$(document).on("click", "#add_blog_post", function(e) {
    e.preventDefault();

    // check post slug exists or not
    $("#add_post_slug").keyup(function(e) {
        let slug = $("#add_post_slug").val();
        let add_blog_post_slug = slug.replace(/[^A-Za-z0-9\-]+/g, "-");

        $.ajax({
            type: "POST",
            url: RequestURL,
            data: {
                checkAddBlogPostSlug: 1,
                add_blog_post_slug: add_blog_post_slug,
            },
            success: function(data) {
                if (data != "0") {
                    $(".add_post_slug_error").html(
                        "<span class='text-danger'>Slug already taken!!</span>"
                    );
                    $("#add_blog_post_btn").attr("disabled", true);
                } else {
                    $(".add_post_slug_error").html(
                        "<span class='text-success'>It's available</span>"
                    );
                    $("#add_blog_post_btn").attr("disabled", false);
                }
            },
        });
    });

    $(document).on("submit", "#add_blog_post_form", function(e) {
        e.preventDefault();

        let post_title = $("#add_post_title").val();
        let post_slug = $("#add_post_slug").val();
        let post_description = $("#add_post_description").val();
        let post_meta_title = $("#add_post_meta_title").val();
        let post_meta_keywords = $("#add_post_meta_keywords").val();
        let post_meta_description = $("#add_post_meta_description").val();

        let post_image = $("#add_post_image").get(0).files.length === 0;

        if (
            post_title == "" ||
            post_slug == "" ||
            post_description == "" ||
            post_meta_title == "" ||
            post_meta_keywords == "" ||
            post_meta_description == "" ||
            post_image
        ) {
            emptyAlert();
        } else {
            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // hide modal
                    $("#add_blog_post_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Form
                    $("#add_blog_post_form")[0].reset();
                    $("#add_post_description").summernote("reset");

                    // Refresh Table
                    $("#blog_category").load(location.href + " #blog_category>*", "");
                    $("#blog_posts").load(location.href + " #blog_posts>*", "");
                },
            });
        }
    });
});

// View Blog Post
$(document).on("click", "#view_blog_post_btn", function(e) {
    e.preventDefault();

    let blog_post_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getBlogPostView: 1,
            blog_post_id: blog_post_id,
        },
        success: function(data) {
            $("#view_post_image").attr("src", "../uploaded_img/" + data.image);

            $("#view_post_title").html(data.title);
            $("#view_post_slug").html(data.slug);
            $("#view_post_category").html(data.category);

            if (data.status == "1") {
                $("#view_post_status").html("Published");
            } else {
                $("#view_post_status").html("Unpublished");
            }

            $("#view_post_created_at").html(data.created_at);
            $("#view_post_meta_title").html(data.meta_title);
            $("#view_post_meta_keywords").html(data.meta_keywords);
            $("#view_post_meta_description").html(data.meta_description);
            $("#view_post_description").html(data.description);
        },
    });
});

// Update Blog Post
$(document).on("click", "#edit_blog_post_btn", function(e) {
    e.preventDefault();

    modalDismiss();

    let edit_blog_post_id = $(this).data("id");

    $.ajax({
        type: "POST",
        url: RequestURL,
        dataType: "json",
        data: {
            getBlogPostData: 1,
            edit_blog_post_id: edit_blog_post_id,
        },
        success: function(data) {
            $("#update_blog_post_id").val(data.id);
            $("#edit_post_title").val(data.title);
            $("#edit_post_slug").val(data.slug);
            $("#edit_post_description").summernote("code", data.description);
            $("#edit_post_meta_title").val(data.meta_title);
            $("#edit_post_meta_description").val(data.meta_description);
            $("#edit_post_meta_keywords").val(data.meta_keywords);

            // Select option by category
            let options = document.querySelectorAll("#edit_post_category option");
            options.forEach((element) => {
                let option = element.value;

                if (option == $("#edit_post_category").val(data.category)) {
                    element.setAttribute("selected", true);
                }
            });

            data.status == 1 ?
                $("#edit_post_status").prop("checked", true) :
                $("#edit_post_status").prop("checked", false);

            // Check blog category slug exist or not
            $("#edit_post_slug").keyup(function(e) {
                let edit_blog_post_slug = $.trim($("#edit_post_slug").val());

                $.ajax({
                    type: "POST",
                    url: RequestURL,
                    data: {
                        checkEditBlogPostSlug: 1,
                        edit_blog_post_slug: edit_blog_post_slug,
                    },
                    success: function(response) {
                        let slug = edit_blog_post_slug.replace(/[^A-Za-z0-9\-]+/g, "-");

                        if (
                            response != "0" &&
                            slug.toLowerCase() != data.slug.toLowerCase()
                        ) {
                            $(".edit_post_slug_error").html(
                                "<span class='text-danger'>Slug already taken!</span>"
                            );

                            $("#update_post_btn").attr("disabled", true);
                        } else {
                            $(".edit_post_slug_error").html(
                                "<span class='text-success'>It's available</span>"
                            );

                            $("#update_post_btn").attr("disabled", false);
                        }
                    },
                });
            });
        },
    });

    // update post
    $(document).on("submit", "#edit_blog_post_form", function(e) {
        e.preventDefault();

        let post_title = $("#edit_post_title").val();
        let post_slug = $("#edit_post_slug").val();
        let post_description = $("#edit_post_description").val();
        let post_meta_title = $("#edit_post_meta_title").val();
        let post_meta_keywords = $("#edit_post_meta_keywords").val();
        let post_meta_description = $("#edit_post_meta_description").val();

        if (
            post_title == "" ||
            post_slug == "" ||
            post_description == "" ||
            post_meta_title == "" ||
            post_meta_keywords == "" ||
            post_meta_description == ""
        ) {
            emptyAlert();
        } else {
            $.ajax({
                url: RequestURL,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // hide modal
                    $("#edit_blog_post_modal").modal("toggle");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);

                    // Refresh Form
                    $("#edit_blog_post_form")[0].reset();

                    // Refresh Table
                    $("#blog_category").load(location.href + " #blog_category>*", "");
                    $("#blog_posts").load(location.href + " #blog_posts>*", "");
                },
            });
        }
    });
    edit_blog_post_id = "";
});


// Delete Blog Post
$(document).on("click", "#delete_blog_post_btn", function(e) {
    e.preventDefault();

    $("#confirmBox").modal("show");
    let delete_blog_post_id = $(this).data("id");
    modalDismiss();

    $("#confirm_ok").click(function() {
        $.ajax({
            url: RequestURL,
            type: "POST",
            data: {
                delete_blog_post: 1,
                delete_blog_post_id: delete_blog_post_id,
            },
            success: function(response) {
                // hide confirm box
                $("#confirmBox").modal("toggle");

                // Refresh Table
                $("#blog_category").load(location.href + " #blog_category>*", "");
                $("#blog_posts").load(location.href + " #blog_posts>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            },
        });
    });
});

// Blog Section Ends Here



// Update Site Info
$(document).on("click", "#update_site_info", function(e) {
    e.preventDefault();
    let site_title = $.trim($("#site_title").val());
    let site_title2 = $.trim($("#site_title2").val());
    let site_description = $.trim($("#site_description").val());
    let site_keywords = $.trim($("#site_keywords").val());
    let og_title = $.trim($("#og_title").val());
    let og_url = $.trim($("#og_url").val());
    let og_description = $.trim($("#og_description").val());

    $.ajax({
        type: "POST",
        url: RequestURL,
        data: {
            update_site_info: 1,
            site_title: site_title,
            site_title2: site_title2,
            site_description: site_description,
            site_keywords: site_keywords,
            og_title: og_title,
            og_url: og_url,
            og_description: og_description
        },
        beforeSend: function() {
            btnLoading("#update_site_info");
        },
        success: function(response) {
            removeBtnLoading("#update_site_info", "Update Info")

            // hide modal
            $("#change_site_info_modal").modal("toggle");

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            // Refresh Content
            $("#site_info").load(location.href + " #site_info>*", "");
        }
    });
});


// Change Site Logo
$(document).on("submit", "#change_logo_form", function(e) {
    e.preventDefault();

    $.ajax({
        url: RequestURL,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            btnLoading("#change_logo");
        },
        success: function(response) {
            removeBtnLoading("#change_logo", "Change Logo");

            // hide modal
            $("#change_logo_modal").modal("toggle");

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            // Refresh Form
            $("#change_logo_form")[0].reset();

            // Refresh Content
            $("#site_info").load(location.href + " #site_info>*", "");
        },
    });
});


// Change Site Open Graphp Image
$(document).on("submit", "#change_og_image_form", function(e) {
    e.preventDefault();

    $.ajax({
        url: RequestURL,
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() {
            btnLoading("#change_og_image");
        },
        success: function(response) {
            removeBtnLoading("#change_og_image", "Change Image");

            // hide modal
            $("#change_og_image_modal").modal("toggle");

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            // Refresh Form
            $("#change_og_image_form")[0].reset();

            // Refresh Content
            $("#site_info").load(location.href + " #site_info>*", "");
        },
    });
});


// ===========================================
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