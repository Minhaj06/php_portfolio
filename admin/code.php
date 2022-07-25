<?php
// header("Location: index.php");
session_start();
include_once 'config/dbConnect.php';

// error_reporting(0);

// check username
if (isset($_POST['CheckAddUsername'])) {

    $username = $_POST['username'];
    $check_username_query = mysqli_query($conn, "SELECT username FROM users_info WHERE username='$username'");
    echo mysqli_num_rows($check_username_query);
}

// email username
if (isset($_POST['CheckAddEmail'])) {

    $email = $_POST['email'];
    $check_email_query = mysqli_query($conn, "SELECT email FROM users_info WHERE email='$email'");
    echo mysqli_num_rows($check_email_query);
}

// Add user or admin
if (isset($_POST['add_email'])) {

    $fname = $_POST['add_fname'];
    $lname = $_POST['add_lname'];
    $username = $_POST['add_username'];
    $email = $_POST['add_email'];
    $contact_no = $_POST['add_contact_no'];
    $role_as = $_POST['add_role_select'];
    $password = $_POST['add_password'];

    $image = $_FILES['add_image']['name'];
    $image_tmp_name = $_FILES['add_image']['tmp_name'];
    $image_size = $_FILES['add_image']['size'];
    $image_folder = '../uploaded_img/' . $username . ".jpg";
    $rename_image = $username . ".jpg";


    if ($image && $image_size > 1500000) {
        echo "Image is too large";
    } else {

        move_uploaded_file($image_tmp_name, $image_folder);

        if ($role_as == "1") {

            mysqli_query($conn, "INSERT INTO users_info (first_name,last_name,username,password,email,contact_no,role_as, image)
VALUES ('$fname','$lname','$username','$password','$email','$contact_no', '$role_as','$rename_image')");

            echo "Admin added successfully...";
        } else {

            mysqli_query($conn, "INSERT INTO users_info (first_name,last_name,username,password,email,contact_no,image) VALUES
('$fname','$lname','$username','$password','$email','$contact_no','$rename_image')");

            echo "User added successfully...";
        }
    }
}



if (isset($_POST['check_id'])) {
    $check_id = $_POST['check_id'];

    // check username
    if (isset($_POST['checkUsername'])) {

        $username = $_POST['username'];
        $check_username_query = mysqli_query($conn, "SELECT username FROM users_info WHERE username='$username'");
        echo mysqli_num_rows($check_username_query);
    }

    // check email
    if (isset($_POST['checkEmail'])) {

        $email = $_POST['email'];
        $check_email_query = mysqli_query($conn, "SELECT email FROM users_info WHERE email='$email'");
        echo mysqli_num_rows($check_email_query);
    }
}


// Update registerd user
if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $select = mysqli_query($conn, "SELECT * FROM users_info WHERE id=$id") or die('Query failed');

    if (mysqli_num_rows($select) > 0) {
        $data = mysqli_fetch_assoc($select);
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $role_as = $_POST['role_as'];
    $rename_image = $username . ".jpg";


    $update_query = mysqli_query($conn, "UPDATE users_info SET first_name='$fname', last_name='$lname',
username='$username', email='$email', contact_no='$contact_no', image='$rename_image', role_as='$role_as' WHERE id =
'$id'") or die('query failed');

    if ($update_query) {

        $rename_image = $username . ".jpg";

        $from = "../uploaded_img/" . $data['username'] . ".jpg";
        $to = "../uploaded_img/" . $username . ".jpg";
        rename($from, $to);

        echo "User updated successfully";
    } else {
        echo "User not updated";
    }
}


// Delete registered user code start
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $query = mysqli_query($conn, "SELECT image FROM users_info WHERE id='$delete_id'");
    $select = mysqli_fetch_assoc($query);
    $image = $select['image'];

    if (unlink('../uploaded_img/' . $image)) {
        mysqli_query($conn, "DELETE FROM users_info WHERE id='$delete_id'");
    }
}
// Delete registered user code start


// Update home section content starts
if (isset($_POST['home_fname'])) {
    $home_fname = $_POST['home_fname'];
    $home_lname = $_POST['home_lname'];
    $home_occu = $_POST['home_occu'];
    $home_desc = $_POST['home_desc'];


    $home_img = $_FILES['home_img']['name'];
    $home_img_tmp_name = $_FILES['home_img']['tmp_name'];

    $home_cv = $_FILES['home_cv']['name'];
    $home_cv_tmp_name = $_FILES['home_cv']['tmp_name'];

    function homeImg()
    {
        global $home_img, $home_img_tmp_name, $home_fname, $home_lname, $home_occu, $home_desc;

        $dotpos = stripos($home_img, '.') + 1;
        $ext = substr($home_img, $dotpos);
        $rand = rand(100000, 1000000);
        $img_folder = '../assets/images/' . $home_img;

        $sql_img = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'], "SELECT image FROM home WHERE id='1'"))['image'];

        if ($sql_img == "") {
            if (file_exists($img_folder)) {
                $newImg = $rand . '.' . $ext;
                move_uploaded_file($home_img_tmp_name, "../assets/images/" . $newImg);

                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', image='$newImg' WHERE id = 1");
            } else {
                move_uploaded_file($home_img_tmp_name, $img_folder);

                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', image='$home_img' WHERE id = 1");
            }
        } else {
            unlink("../assets/images/" . $sql_img);

            if (file_exists($img_folder)) {
                $newImg = $rand . '.' . $ext;
                move_uploaded_file($home_img_tmp_name, "../assets/images/" . $newImg);

                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', image='$newImg' WHERE id = 1");
            } else {
                move_uploaded_file($home_img_tmp_name, $img_folder);

                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', image='$home_img' WHERE id = 1");
            }
        }
    }

    function homeCV()
    {
        global $home_cv, $home_cv_tmp_name, $home_fname, $home_lname, $home_occu, $home_desc;

        $dotpos = stripos($home_cv, '.') + 1;
        $ext = substr($home_cv, $dotpos);
        $rand = rand(100000, 1000000);
        $cv_folder = '../assets/files/' . $home_cv;

        $sql_cv = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'], "SELECT cv FROM home WHERE id='1'"))['cv'];

        if ($sql_cv == "") {
            if (file_exists($cv_folder)) {
                $newCV = $rand . '.' . $ext;
                move_uploaded_file($home_cv_tmp_name, "../assets/files/" . $newCV);
                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', cv='$newCV' WHERE id = 1");
            } else {
                move_uploaded_file($home_cv_tmp_name, $cv_folder);
                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', cv='$home_cv' WHERE id = 1");
            }
        } else {
            unlink("../assets/files/" . $sql_cv);

            if (file_exists($cv_folder)) {
                $newCV = $rand . '.' . $ext;
                move_uploaded_file($home_cv_tmp_name, "../assets/files/" . $newCV);
                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', cv='$newCV' WHERE id = 1");
            } else {
                move_uploaded_file($home_cv_tmp_name, $cv_folder);
                mysqli_query($GLOBALS['conn'], "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc', cv='$home_cv' WHERE id = 1");
            }
        }
    }


    if (!empty($home_img) && !empty($home_cv)) {

        homeImg();
        homeCV();
        echo "Home content update successfylly";
    } elseif (!empty($home_img)) {

        homeImg();
        echo "Home content update successfylly";
    } elseif (!empty($home_cv)) {

        homeCV();
        echo "Home content update successfylly";
    } else {

        mysqli_query($conn, "UPDATE home SET fname='$home_fname', lname='$home_lname',occupation='$home_occu', subtitle='$home_desc' WHERE id = 1");
        echo "Home content update successfylly";
    }
}
// Update home section content ends






// Update about section content starts


if (isset($_POST['about_title'])) {
    $about_title = $_POST['about_title'];
    $about_desc = $_POST['about_desc'];
    $about_desc = str_replace("'", "\'", $about_desc);
    $experience = $_POST['experience'];
    $about_img = $_FILES['about_img']['name'];

    function aboutImg()
    {
        global $conn, $about_title, $about_desc, $experience;

        $about_img = $_FILES['about_img']['name'];
        $about_img_tmp_name = $_FILES['about_img']['tmp_name'];

        $dotpos = stripos($about_img, '.') + 1;
        $ext = substr($about_img, $dotpos);
        $rand = rand(100000, 1000000);
        $img_folder = '../assets/images/' . $about_img;


        if (file_exists($img_folder)) {
            $newImg = $rand . '.' . $ext;
            move_uploaded_file($about_img_tmp_name, "../assets/images/" . $newImg);

            mysqli_query($conn, "UPDATE about SET about_title = '$about_title', about_desc = '$about_desc', experience = '$experience', about_image = '$newImg' WHERE id = 1");
        } else {
            move_uploaded_file($about_img_tmp_name, $img_folder);

            mysqli_query($conn, "UPDATE about SET about_title = '$about_title', about_desc = '$about_desc', experience = '$experience', about_image = '$about_img' WHERE id = 1");
        }
    }



    if (!empty($about_img)) {

        $sql_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT about_image FROM about WHERE id = 1"))['about_image'];

        if (empty($sql_img)) {
            aboutImg();
            echo "About content updated successfully";
        } else {
            $sql_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT about_image FROM about WHERE id = 1"))['about_image'];

            if (unlink("../assets/images/" . $sql_img)) {
                aboutImg();
                echo "About content updated successfully";
            }
        }
    } else {
        $query = mysqli_query($conn, "UPDATE about SET about_title = '$about_title', about_desc = '$about_desc', experience = '$experience' WHERE id = 1");
    }
    if ($query) {
        echo "About content updated successfully";
    }
}

// Add skill
if (isset($_POST['add_skill'])) {
    $skill_name = $_POST['skillName'];
    $skill_percentage = $_POST['skillPercentage'];
    $skill_progress_color = $_POST['skillProgessColor'];

    if (isset($skill_progress_color)) {
        $add_skill_query = mysqli_query($conn, "INSERT INTO `skills` (skill_name, skill_percentage, skill_color) VALUES ('$skill_name', '$skill_percentage', '$skill_progress_color')");

        if ($add_skill_query) {
            echo "Skill added successfully";
        }
    }
}

// Update skill
if (isset($_POST['update_skill'])) {

    $skill_id = $_POST['skill_id'];

    $skill_name = $_POST['skill_name'];
    $skill_percentage = $_POST['skill_percentage'];
    $skill_color = $_POST['skill_color'];

    // check skill already exists or not
    $prev_skill_name = mysqli_fetch_assoc(mysqli_query($conn, "SELECT skill_name FROM `skills` WHERE skill_id='$skill_id' "))['skill_name'];


    $query = mysqli_query($conn, "SELECT skill_name FROM `skills` WHERE skill_name='$skill_name' ");

    if ($prev_skill_name != $skill_name && mysqli_num_rows($query) > 0) {
        echo "Skill already exists";
    } else {
        $edit_skill_query = mysqli_query($conn, "UPDATE `skills` SET skill_name='$skill_name', skill_percentage='$skill_percentage', skill_color='$skill_color' WHERE skill_id='$skill_id' ");

        if ($edit_skill_query) {
            echo "Skill updated successfully";
        }
    }
}



// Delete Skill
if (isset($_POST['delete_skill'])) {
    $skill_id = $_POST['skill_id'];


    $query = mysqli_query($conn, "DELETE FROM `skills` WHERE skill_id='$skill_id'");

    if ($query) {
        echo "Skill deleted successfully";
    }
}


// Update about section content ends





// Service content starts

// Update Service Content
if (isset($_POST['update_service_content'])) {

    $service_title = $_POST['service_title'];
    $service_desc = $_POST['service_desc'];

    $query = mysqli_query($conn, "UPDATE `service_section` SET service_title = '$service_title', service_desc = '$service_desc' WHERE serv_sec_id = 1 ");

    if ($query) {
        echo 'Service content updated successfully';
    }
}

// Add service starts here
// Check service name already exists or not
if (isset($_POST['checkAddServiceName'])) {
    $service_name = $_POST['add_service_name'];
    $check_service_name_query = mysqli_query($conn, "SELECT service_name FROM service_items WHERE service_name = '$service_name' ");

    echo mysqli_num_rows($check_service_name_query);
}


if (isset($_POST['add_service'])) {
    $service_name = $_POST['service_name'];
    $service_icon = $_POST['service_icon'];

    $query = mysqli_query($conn, "INSERT INTO `service_items` (service_name, service_icon) VALUES ('$service_name', '$service_icon')");

    if ($query) {
        echo "Service added successfully";
    } else {
        echo "Something went wrong";
    }
}
// Add service ends here


// Edit service item start here

// Check service name already exists or not
function check_exist($checkData, $table_name, $column)
{
    global $conn;

    $check_query = mysqli_query($conn, "SELECT $column FROM $table_name WHERE $column = '$checkData' ");

    echo mysqli_num_rows($check_query);
}

if (isset($_POST['checkEditServiceName'])) {
    check_exist($_POST['edit_service_name'], 'service_items', 'service_name');
}

// update data
if (isset($_POST['update_service'])) {

    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $service_icon = $_POST['service_icon'];

    $query = mysqli_query($conn, "UPDATE  `service_items` SET service_name = '$service_name', service_icon = '$service_icon' WHERE serv_item_id = '$service_id' ");

    if ($query) {
        echo "Service added successfully";
    } else {
        echo "Something went wrong";
    }
}
// Edit service item start here


// Delete service item start here
if (isset($_POST['delete_service'])) {
    $service_delete_id = $_POST['service_delete_id'];

    $query = mysqli_query($conn, "DELETE FROM `service_items` WHERE serv_item_id = '$service_delete_id' ");

    if ($query) {
        echo "Service deleted succfully";
    } else {
        echo "Service not deleted";
    }
}
// Delete service item end here

// Service content ends


// Achievements content start

// Update all achievements
if (isset($_POST['update_achievements'])) {
    $clients_all = $_POST['clients_all'];
    $projects_all = $_POST['projects_all'];
    $awards_all = $_POST['awards_all'];
    $experience_all = $_POST['experience_all'];

    $query = mysqli_query($conn, "UPDATE `achievements` SET clients = '$clients_all', projects = '$projects_all', awards = '$awards_all', experience = '$experience_all' WHERE achieve_id = 1");

    if ($query) {
        echo "Achivements updated successfully";
    } else {
        echo "Achievements not updated";
    }
}

// Update total clients
if (isset($_POST['update_clients'])) {
    $clients_total = $_POST['clients_total'];

    $query = mysqli_query($conn, "UPDATE `achievements` SET clients = '$clients_total' WHERE achieve_id = 1");

    if ($query) {
        echo "Clients updated successfully";
    } else {
        echo "Clients not updated";
    }
}

// Update total projects
if (isset($_POST['update_projects'])) {
    $projects_total = $_POST['projects_total'];

    $query = mysqli_query($conn, "UPDATE `achievements` SET projects = '$projects_total' WHERE achieve_id = 1");

    if ($query) {
        echo "Projects updated successfully";
    } else {
        echo "Projects not updated";
    }
}

// Update total awards
if (isset($_POST['update_awards'])) {
    $awards_total = $_POST['awards_total'];

    $query = mysqli_query($conn, "UPDATE `achievements` SET awards = '$awards_total' WHERE achieve_id = 1");

    if ($query) {
        echo "Awards updated successfully";
    } else {
        echo "Awards not updated";
    }
}

// Update total awards
if (isset($_POST['update_experience'])) {
    $experience_total = $_POST['experience_total'];

    $query = mysqli_query($conn, "UPDATE `achievements` SET experience = '$experience_total' WHERE achieve_id = 1");

    if ($query) {
        echo "Experience updated successfully";
    } else {
        echo "Experience not updated";
    }
}

// Achievements content end