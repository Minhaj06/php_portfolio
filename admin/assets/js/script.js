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
    sidebar.classList.toggle("close");
    sidebar.classList.toggle("sideTop");
    topNavRight.classList.toggle("show_right_nav");
    main.classList.toggle("mainTop");
});

searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
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

let dropdown1 = document.querySelector(".dropdown1");
let dropdown2 = document.querySelector(".dropdown2");
let sub_menu1 = document.querySelector(".sub_menu1");
let sub_menu2 = document.querySelector(".sub_menu2");
let drop_icon1 = document.querySelector(".drop_icon1");
let drop_icon2 = document.querySelector(".drop_icon2");

dropdown1.addEventListener("click", () => {
    sub_menu1.classList.toggle("sub_menu_show");
    drop_icon1.classList.toggle("rotate");

    sub_menu2.classList.remove("sub_menu_show");
    drop_icon2.classList.remove("rotate");
});

dropdown2.addEventListener("click", () => {
    sub_menu2.classList.toggle("sub_menu_show");
    drop_icon2.classList.toggle("rotate");

    sub_menu1.classList.remove("sub_menu_show");
    drop_icon1.classList.remove("rotate");
});

// #########################################################################

// Data table ready function
$(document).ready(function() {
    $("#usersDataTable").DataTable();
});

// alert message function
function showMessage() {
    document.querySelector(".message_show").classList.remove("d-none");
}
document.querySelector(".btn-close").addEventListener("click", function() {
    document.querySelector(".message_show").classList.add("d-none");
})

// Reload location On dismiss modal
function modalDismiss() {
    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(item => {
        item.addEventListener("click", function() {
            location.reload();
        })
    })
}

// $(document).ready(function() {
// check username exists or not
$("#add_username").keyup(function(e) {
    let username = $("#add_username").val();

    $.ajax({
        type: "POST",
        url: "code.php",
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
        url: "code.php",
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
        fname === "" ||
        lname === "" ||
        username === "" ||
        email === "" ||
        contact_no === "" ||
        password === "" ||
        image
    ) {
        $("#alertBox").modal("show");
        $(".alertMessage").html("Oops! Fill up all the fields...");
    } else {
        let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

        if (pattern.test(email)) {
            $.ajax({
                url: "code.php",
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
    console.log(fname)
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
            url: "code.php",
            data: {
                checkUsername: 1,
                username: username,
                check_id: id,
            },

            success: function(data) {
                if ((data != "0") && ((username.toLowerCase()) != (td_username.toLowerCase()))) {
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
            url: "code.php",
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

        // Cheking fields empty or not
        if (
            id === "" ||
            fname === "" ||
            lname === "" ||
            username === "" ||
            email === "" ||
            contact_no === ""
        ) {
            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");
        } else {
            let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if (pattern.test(email)) {
                $.ajax({
                    url: "code.php",
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

    let role = $.trim($("#" + id).children("td[data-target=role_as]").text());


    $("#confirm_ok").click(function() {
        $.ajax({
            url: "code.php",
            type: "POST",
            data: { delete_id: id },
            success: function(response) {

                // Hide Row
                $("#" + id).hide();

                // Message Show
                showMessage();
                if (role == 'Admin') {
                    $(".message_show .ation_message").html("Admin deleted successfully...");
                } else {
                    $(".message_show .ation_message").html("User deleted successfully...");
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
            home_fname === "" ||
            home_lname === "" ||
            home_occu === "" ||
            home_desc === ""
        ) {

            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");

        } else {

            let home_form = document.getElementById("update_home_form");

            $.ajax({
                url: "code.php",
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
        if (
            about_title === "" ||
            about_desc === ""
        ) {

            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");

        } else {

            let about_form = document.getElementById("update_about_form");

            $.ajax({
                url: "code.php",
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
        $("#alertBox").modal("show");
        $(".alertMessage").html("Oops! Fill up all the fields...");
    } else {
        let add_skill_form = document.getElementById("add_skill_form");

        $.ajax({
            url: "code.php",
            type: "POST",
            data: {
                add_skill: 1,
                skillName: skillName,
                skillPercentage: skillPercentage,
                skillProgessColor: skillProgessColor
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
            }
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
    let skill_color = $("#" + skill_id).data("color").toLowerCase();


    // Fetching data in update modal input
    $("#edit_skill_name").val(skill_name);
    $("#edit_skill_percentage").val(skill_percentage);

    // If skill color == radio button color then select that radio button
    let progress_color1 = $("#edit_progress_color1").val().toLowerCase();

    let progress_color2 = $("#edit_progress_color2").val().toLowerCase();

    let progress_color3 = $("#edit_progress_color3").val().toLowerCase();

    let progress_color4 = $("#edit_progress_color4").val().toLowerCase();

    if (progress_color1 === skill_color) {
        $("#edit_progress_color1").prop("checked", true);
    } else if (progress_color2 === skill_color) {
        $("#edit_progress_color2").prop("checked", true);
    } else if (progress_color3 === skill_color) {
        $("#edit_progress_color3").prop("checked", true);
    } else if (progress_color4 === skill_color) {
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
            url: "code.php",
            data: {
                update_skill: 1,
                skill_id: skill_id,
                skill_name: skill_name,
                skill_percentage: skill_percentage,
                skill_color: skill_color
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
            }
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
            url: "code.php",
            type: "POST",
            data: {
                delete_skill: 1,
                skill_id: skill_id
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

    if (
        service_title === "" ||
        service_desc === ""
    ) {

        $("#alertBox").modal("show");
        $(".alertMessage").html("Oops! Fill up all the fields...");

    } else {

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                update_service_content: 1,
                service_title: service_title,
                service_desc: service_desc
            },
            success: function(response) {
                // hide modal
                $("#edit_service_content_modal").modal("toggle");

                // Refresh Service Content
                $("#service_content").load(location.href + " #service_content>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            }
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
            url: "code.php",
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
            }
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

        if (
            service_name === "" ||
            service_icon === ""
        ) {

            $("#alertBox").modal("show");
            $(".alertMessage").html("Oops! Fill up all the fields...");

        } else {
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    add_service: 1,
                    service_name: service_name,
                    service_icon: service_icon
                },
                success: function(response) {
                    // hide modal
                    $("#add_service_modal").modal("toggle");

                    // Refresh Services
                    $("#service_items").load(location.href + " #service_items>*", "");
                    // Refresh form
                    $("#add_service_modal").load(location.href + " #add_service_modal>*", "");

                    // Messsage Show
                    showMessage();
                    $(".message_show .ation_message").html(response);
                }
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
    let td_service_name = $.trim($("#" + service_id).children("td[data-target=service_name]").text());
    let td_service_icon = $.trim($("#" + service_id).children("td[data-target=service_icon]").html());

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
            url: "code.php",
            data: {
                checkEditServiceName: 1,
                edit_service_name: service_name,
            },

            success: function(response) {
                if ((response != "0") && ((service_name.toLowerCase()) != (td_service_name.toLowerCase()))) {
                    $(".edit_service_error").html(
                        "<span class='text-danger'>Service name already taken!</span>"
                    );
                    $("#update_service_btn").attr("disabled", true);
                    $("#edit_service_icon").attr("disabled", true);
                } else if (service_name === "") {
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
            }
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
        } else if (service_icon === "") {
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
            url: "code.php",
            data: {
                update_service: 1,
                service_id: service_id,
                service_name: service_name,
                service_icon: service_icon
            },
            success: function(response) {
                // hide modal
                $("#edit_service_modal").modal("toggle");

                // Refresh Skill Content
                $("#service_items").load(location.href + " #service_items>*", "");

                // Messsage Show
                showMessage();
                $(".message_show .ation_message").html(response);
            }
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
            url: "code.php",
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


$(document).on("click", "#update_achivements", function(e) {
    e.preventDefault();

    let clients_all = $("#clients_all").val();
    let projects_all = $("#projects_all").val();
    let awards_all = $("#awards_all").val();
    let experience_all = $("#experience_all").val();

    $.ajax({
        type: "POST",
        url: "code.php",
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
            $("#achievements_content").load(location.href + " #achievements_content>*", "");

            // Messsage Show
            showMessage();
            $(".message_show .ation_message").html(response);

            animCounter();
        }
    });
});
// Achievements Section Ends Here