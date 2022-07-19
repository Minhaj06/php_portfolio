<?php
session_start();
include 'admin/config/dbConnect.php';
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login to view profile!";
    header("Location: login.php");
    exit(0);
}

$user_id = $_SESSION['auth_user']['user_id'];

$select = mysqli_query($conn, "SELECT * FROM users_info WHERE id=$user_id") or die('Query failed');

if (mysqli_num_rows($select) > 0) {
    $fetch_data = mysqli_fetch_assoc($select);
}
$image_path = "uploaded_img/" . $fetch_data['username'] . ".jpg";


// Update Profile Code Starts Here
if (isset($_POST['update_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $password = $_POST['password'];


    $image =  $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'uploaded_img/' . $username . ".jpg";
    $rename_image = $username . ".jpg";

    if (($fetch_data['first_name'] == $fname && $fetch_data['last_name'] == $lname && $fetch_data['username'] == $username && $fetch_data['email'] == $email && $fetch_data['contact_no'] == $contact_no && empty($image))) {
        $_SESSION['message'] = '<span class="text-danger">Edit value to update data...</span>';
        header("Location: user_profile.php?action=update_profile");
        exit(0);
    } else {
        // check username & email
        $check_username = mysqli_query($conn, "SELECT username FROM users_info WHERE username='$username'");

        $check_email = mysqli_query($conn, "SELECT email FROM users_info WHERE email='$email'");

        if (($fetch_data['username'] != $username && mysqli_num_rows($check_username) > 0) && ($fetch_data['email'] != $email && mysqli_num_rows($check_email) > 0)) {

            $_SESSION['message'] = '<span class="text-danger">username and email already exits!</span>';
            header("Location: user_profile.php?action=update_profile");
            exit(0);
        } elseif ($fetch_data['username'] != $username && mysqli_num_rows($check_username) > 0) {

            $_SESSION['message'] = '<span class="text-danger">Username already exits!</span>';
            header("Location: user_profile.php?action=update_profile");
            exit(0);
        } elseif ($fetch_data['email'] != $email && mysqli_num_rows($check_email) > 0) {

            $_SESSION['message'] = '<span class="text-danger">Email already exits!</span>';
            header("Location: user_profile.php?action=update_profile");
            exit(0);
        } else {
            if ($fetch_data['password'] != $password) {
                $_SESSION['message'] = '<span class="text-danger">Password does not match!</span>';
                header("Location: user_profile.php?action=update_profile");
                exit(0);
            } else {

                if ($image || empty($image)) {
                    if ($image_size > 2000000) {
                        $_SESSION['message'] = '<span class="text-danger">Image is too large!</span>';
                        header("Location: user_profile.php?action=update_profile");
                        exit(0);
                    } else {

                        $update_query = mysqli_query($conn, "UPDATE users_info SET first_name='$fname', last_name='$lname', username='$username', email='$email', contact_no='$contact_no', image = '$rename_image' WHERE id = '$user_id'") or die('query failed');


                        if (!empty($image)) {
                            if ($update_query) {
                                $delete_prev_img = $image_path;
                                if (!unlink($delete_prev_img)) {
                                    $_SESSION['message'] = '<span class="text-danger">Previous image could not be deleted!</span>';
                                    header("Location: user_profile.php?action=update_profile");
                                    exit(0);
                                } else {
                                    move_uploaded_file($image_tmp_name, $image_folder);
                                    $_SESSION['message'] = "Profile and Image updated successfully...";
                                    header("Location: user_profile.php?action=update_profile");
                                    exit(0);
                                }
                            }
                        } else {

                            if ($fetch_data['username'] != $username) {

                                $from = "uploaded_img/" . $fetch_data['username'] . ".jpg";
                                $to = "uploaded_img/" . $username . ".jpg";
                                rename($from, $to);

                                $_SESSION['message'] = "Profile updated successfully...";
                                header("Location: user_profile.php?action=update_profile");
                                exit(0);

                                if ($update_query) {
                                    $_SESSION['message'] = "Profile and Image updated successfully...";
                                    header("Location: user_profile.php?action=update_profile");
                                    exit(0);
                                }
                            } elseif ($update_query) {
                                $_SESSION['message'] = "Profile updated successfully...";
                                header("Location: user_profile.php?action=update_profile");
                                exit(0);
                            }
                        }
                    }
                } else {
                    $_SESSION['message'] = '<span class="text-danger">Something went worong! Try again...</span>';
                    header("Location: user_profile.php?action=update_profile");
                    exit(0);
                }
            }
        }
    }
} // Update Profile Code Ends Here


// Change Password code
if (isset($_POST['change_pass'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_new_pass = $_POST['confirm_new_pass'];
    if (!empty($old_pass) && !empty($new_pass) && !empty($confirm_new_pass)) {

        if (!($fetch_data['password'] == $old_pass)) {
            $_SESSION['message'] = '<span class="text-danger">Old password not matched!</span>';
            header("Location: user_profile.php?action=change_password");
            exit(0);
        } elseif ($new_pass != $confirm_new_pass) {
            $_SESSION['message'] = '<span class="text-danger">Confirm password not matched!</span>';
            header("Location: user_profile.php?action=change_password");
            exit(0);
        } else {
            mysqli_query($conn, "UPDATE users_info SET password='$confirm_new_pass' WHERE id = '$user_id'") or die('query failed');
            $_SESSION['message'] = "Password changed successfully";
            header("Location: user_profile.php?action=change_password");
            exit(0);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("assets/includes/meta_links_scripts.php"); ?>
    <title>User Profile</title>
    <style>
    body {
        background: #01202c;
    }

    .profile_heading {
        text-align: center;
        text-transform: capitalize;
        padding: 1rem 0;
        background: #000;
        margin-top: 1rem;
        border-radius: .3rem;
        border: 1px solid var(--gray);
    }

    .card {
        color: #fff;
        background: #000;
        border: 1px solid var(--gray);
    }

    .profile_pic {
        width: 20rem;
        height: 20rem;
        border-radius: 50%;
        margin-bottom: 2.5rem;
        background-color: #01202c;
    }

    .option_btn {
        color: #fff;
        background: #01202c;
    }

    .option_btn:hover {
        color: #fff;
        background: #011922;
    }

    .input_icon {
        background: #01202c;
        border-radius: .4rem;
    }

    .input {
        padding: .7rem;
    }

    .back_btn {
        color: #fff;
        background: var(--orange);
    }

    .back_btn:hover {
        color: #fff;
        background: #d7460c;
    }

    .about_user .profile_pic {
        width: 15rem;
        height: 15rem;
    }

    .table {
        color: #fff;
    }

    .table tr {
        border-color: var(--gray);
    }

    .table th {
        padding: 1.2rem 1rem 1.2rem 0 !important;
    }

    .table td {
        padding: 1.2rem 0 !important;
    }

    .user_email {
        word-break: break-all;
    }
    </style>
</head>

<body>
    <?php include_once 'assets/includes/navbar.php'; ?>


    <section class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <?php if (isset($_GET["action"]) && $_GET["action"] == "update_profile") { ?>
                <div class="col-12 col-lg-8 col-xl-7 col-xxl-6">
                    <h1 class="profile_heading">update profile</h1>
                    <div class="card my-5 rounded-3">
                        <div class="card-body px-4 py-5 fs-4">
                            <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="text-center mb-3">
                                    <img class="profile_pic" src="<?= 'uploaded_img/' . $fetch_data['image'] ?>"
                                        alt="profile_pic">
                                    <!-- <img class="profile_pic" src="<?= $image_path ?>" alt="profile_pic"> -->
                                    <h3><?= $fetch_data['username'] ?></h3>
                                    <h4><?= $fetch_data['email'] ?></h4>
                                </div>
                                <?php include 'message.php' ?>
                                <div class="row g-4 text-capitalize">
                                    <div class="form-group col-sm-6">
                                        <label for="fname" class="label-control">first name</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-user fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="text" name="fname"
                                                id="fname" value="<?= $fetch_data['first_name'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lname" class="label-control">last name</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-user fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="text" name="lname"
                                                id="lname" value="<?= $fetch_data['last_name'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="username" class="label-control">username</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-user fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="text" name="username"
                                                id="username" value="<?= $fetch_data['username'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email" class="label-control">email</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-user fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="email" name="email"
                                                id="email" value="<?= $fetch_data['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="contact_no" class="label-control">contact</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-user fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="text"
                                                name="contact_no" id="contact_no"
                                                value="<?= $fetch_data['contact_no'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="image">Profile Pic</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-address-card fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="file" name="image"
                                                id="image" accept="image/jpg, image/png, image/jpeg">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="password">password</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-lock fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="password"
                                                name="password" id="password"
                                                placeholder="Enter password to update profile" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input class="update_btn btn btn-primary w-100 text-capitalize fs-3 mt-3 py-2"
                                            type="submit" name="update_btn" value="update profile">
                                    </div>
                                    <div class="col-6">
                                        <a class="back_btn btn w-100 text-capitalize fs-3 mt-3 py-2"
                                            href="user_profile.php">go
                                            back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } elseif (isset($_GET["action"]) && $_GET["action"] == "change_password") { ?>


                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <h1 class="profile_heading">Change Password</h1>
                    <div class="card my-5 rounded-3">
                        <div class="card-body px-4 py-5 fs-4">
                            <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="text-center mb-3">
                                    <img class="profile_pic" src="<?= $image_path ?>" alt="profile_pic">
                                    <h3><?= $fetch_data['username'] ?></h3>
                                    <h4><?= $fetch_data['email'] ?></h4>
                                </div>

                                <?php include 'message.php' ?>

                                <div class="text-capitalize">
                                    <!-- <input class="form-control fs-4 border-0 input" type="hidden" name="password"
                                        id="password" value="<?= $fetch_data['password'] ?>"> -->
                                    <div class="form-group mt-3">
                                        <label for="old_pass">old password</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-lock fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="password"
                                                name="old_pass" id="old_pass" placeholder="Enter Old Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="old_pass">new password</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-lock fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="password"
                                                name="new_pass" id="new_pass" placeholder="Enter New Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="confirm_new_pass">confirm new password</label>
                                        <div class="input_icon d-flex align-items-center">
                                            <i class="fa-solid fa-key fs-3 px-4"></i>
                                            <input class="form-control fs-4 border-0 input" type="password"
                                                name="confirm_new_pass" id="confirm_new_pass"
                                                placeholder="Re-Enter New Password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="btn btn-primary w-100 text-capitalize fs-3 mt-3 py-2"
                                                type="submit" name="change_pass" value="change password">
                                        </div>
                                        <div class="col-6">
                                            <a class="back_btn btn w-100 text-capitalize fs-3 mt-3 py-2"
                                                href="user_profile.php">go
                                                back</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>












                    <?php } elseif (isset($_GET["action"]) && $_GET["action"] == "show_details") { ?>

                    <div class="col-md-12 col-xl-10">
                        <h1 class="profile_heading">About Yourself</h1>
                        <div class="card my-5 rounded-3">
                            <div class="card-body p-5 fs-4 overflow-hidden">
                                <div class="row g-5 about_user">
                                    <div class="col-md-6 col-lg-5 text-center">
                                        <div class="overflow-hidden text-center">


                                            <img class="profile_pic" src="<?= $image_path ?>" alt="profile_pic">
                                            <h3><?= $_SESSION['auth_user']['username'] ?></h3>
                                            <h4><?= $_SESSION['auth_user']['email'] ?></h4>
                                            <a class="btn btn-primary w-100 mt-4 text-capitalize fs-4"
                                                href="user_profile.php?action=update_profile">update
                                                profile</a>
                                            <a class="logout_btn btn btn-danger w-100 mt-3 text-capitalize fs-4"
                                                href="logout.php">logout</a>
                                            <div class="row gx-3 mt-3">
                                                <div class="col-6">
                                                    <a class="option_btn btn w-100 text-capitalize fs-4"
                                                        href="user_profile.php">go back</a>
                                                </div>
                                                <div class="col-6">
                                                    <a class="option_btn btn w-100 text-capitalize fs-4"
                                                        href="blog.php">read
                                                        blogs</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-7">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Username</th>
                                                    <td><?= $_SESSION['auth_user']['username'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td><?= $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td class="user_email"><?= $_SESSION['auth_user']['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hello</th>
                                                    <td><?= $_SESSION['auth_user']['contact_no'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php } else { ?>


                    <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                        <h1 class="profile_heading">Your Profile</h1>
                        <div class="card my-5 rounded-3">
                            <div class="card-body p-5 fs-4 overflow-hidden text-center">

                                <img class="profile_pic" src="<?= $image_path ?>" alt="profile_pic'">
                                <h3><?= $fetch_data['username'] ?></h3>
                                <h4><?= $fetch_data['email']; ?></h4>
                                <a class="btn btn-primary w-100 mt-4 text-capitalize fs-3"
                                    href="user_profile.php?action=update_profile">update profile</a>
                                <a class="btn btn-danger w-100 mt-4 text-capitalize fs-3"
                                    href="user_profile.php?action=change_password">Change Password</a>
                                <a class="logout_btn btn btn-dark w-100 mt-3 text-capitalize fs-3"
                                    href="logout.php">logout</a>
                                <div class="row gx-3 mt-3">
                                    <div class="col-6">
                                        <a class="option_btn btn w-100 text-capitalize fs-3"
                                            href="user_profile.php?action=show_details">show
                                            details</a>
                                    </div>
                                    <div class="col-6">
                                        <a class="option_btn btn w-100 text-capitalize fs-3" href="blog.php">read
                                            blogs</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </section>
</body>

</html>