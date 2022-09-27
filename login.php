<?php
include 'admin/config/dbConnect.php';


if (isset($_POST['register_btn'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];


    $image =  $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'uploaded_img/' . $username . ".jpg";
    $rename_image = $username . ".jpg";



    if ($password == $confirm_password) {
        // Check Email
        $check_email = "SELECT email FROM users_info WHERE email='$email'";

        $check_email_run = mysqli_query($conn, $check_email);

        if (mysqli_num_rows($check_email_run) > 0) {
            // Already Email Exists
            $_SESSION['message'] = "Already Email Exists";
        } else {
            // Check Username
            $check_username = "SELECT username FROM users_info WHERE username='$username'";

            $check_username_run = mysqli_query($conn, $check_username);

            if (mysqli_num_rows($check_username_run) > 0) {
                // Already Username Exists
                $_SESSION['message'] = "Already Username Exists";

                header("Location: login.php?action=user-registration");
                exit(0);
            } else {


                if ($image_size > 1500000) {
                    $_SESSION['message'] = '<span class="text-danger">Image is too large!</span>';
                    header("Location: login.php?action=user-registration");
                    exit(0);
                } else {
                    $user_query = "INSERT INTO users_info (first_name,last_name,username,password,email,contact_no,image) VALUES ('$first_name','$last_name','$username','$password','$email','$contact_no','$rename_image')";

                    $user_query_run = mysqli_query($conn, $user_query);

                    if ($user_query_run) {

                        move_uploaded_file($image_tmp_name, $image_folder);

                        $_SESSION['message'] = "Registered Successfully...";
                        header("Location: login.php");
                        exit(0);
                    } else {
                        $_SESSION['message'] = '<span class="text-danger">Something went worong! Try again...</span>';
                        header("Location: login.php?action=user-registration");
                        exit(0);
                    }
                }
            }
        }
    } else {
        $_SESSION['message'] = '<span class="text-danger">Password and confirm password does not match</span>';
        header("Location: login.php?action=user-registration");
        exit(0);
    }
}


if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users_info WHERE email='$email' AND password='$password' LIMIT 1";

    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $login_data) {
            $user_id = $login_data['id'];
            $user_fname = $login_data['first_name'];
            $user_lname = $login_data['last_name'];
            $username = $login_data['username'];
            $email = $login_data['email'];
            $contact_no = $login_data['contact_no'];
            $role_as = $login_data['role_as'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; // 1=admin, 0=user
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_fname' => $user_fname,
            'user_lname' => $user_lname,
            'username' => $username,
            'email' => $email,
            'contact_no' => $contact_no,
        ];

        if ($_SESSION['auth_role'] == 1) // 1=admin
        {
            $_SESSION['message'] = "Welcome to dashboard";
            header("Location: admin/index.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == 0) // 0=user
        {
            $_SESSION['message'] = "Logged in successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Invalid Email or Password";
            header("Location: login.php");
            exit(0);
        }
    } elseif (mysqli_num_rows($login_query_run) == 0) {
        $_SESSION['message'] = "No user founded...";
        header("Location: login.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong! Try Again...";
        header("Location: login.php");
        exit(0);
    }
}


if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "1") {
        $_SESSION['message'] = "You are already Logged IN";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "You are already Logged IN";
        header("Location: admin/index.php");
        exit(0);
    }
}

if (isset($_GET["action"]) == "user-registration") {
    $title = "Registration || Coder";
    $og_url = "login.php?action=user-registration";
} else {
    $title = "Login || Coder";
    $og_url = "login.php";
}

?>

<?php include_once("assets/includes/head.php") ?>

<style>
body {
    background: #01202c;
}

.card {
    color: #fff;
    background: #000;
    border: 1px solid var(--gray);
}


.signInWith a {
    color: #fff;
}

.signInWith a:hover {
    color: #ccc;
}

.submit_btn {
    color: #fff;
    background: #000;
    border: 1px solid var(--gray);
    text-transform: capitalize;
    border-radius: .2rem;
}

.submit_btn:hover {
    color: #fff;
    background: var(--orange);
}

.forgot_text:hover {
    color: var(--gray) !important;
}

p {
    margin-bottom: 0;
}

.google {
    background: #DB4437;
    border-radius: .2rem;
}

.facebook {
    background: #3b5998;
    border-radius: .2rem;
}

.twitter {
    background: #00acee;
    border-radius: .2rem;
}

.input_icon {
    background: #01202c;
    border-radius: .2rem;
}

.input {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    padding: .7rem;
}

.input_icon input:focus {
    outline: 0px !important;
    -webkit-appearance: none;
    box-shadow: none !important;
}

.or_container {
    align-items: center;
    color: #fff;
    display: flex;
    margin: 2rem 0;
}

.line_separator {
    background-color: #fff;
    flex-grow: 5;
    height: 1px
}

.or_label {
    flex-grow: 1;
    text-align: center
}

.no_account {
    border-top: 1px solid;
}

.no_account a {
    text-decoration: none;
    color: #3b5998;
}

.no_account a:hover {
    color: var(--gray) !important;
}
</style>
</head>

<body class="line-numbers">

    <?php include_once 'assets/includes/navbar.php'; ?>
    <section class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card my-5 px-sm-5 rounded-3">
                        <div class="card-body p-5 fs-4 text-capitalize">

                            <?php
                            if (isset($_GET["action"]) == "user-registration") {
                            ?>

                            <h1 class="text-center mb-4">User Registration</h1>
                            <div class="signInWith">
                                <a href=""
                                    class="google text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-google pe-4"></i>
                                    <p class="signVia">login with <strong>google</strong>
                                    </p>
                                </a>
                                <a href=""
                                    class="facebook text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-facebook pe-4"></i>
                                    <p class="signVia">login with <strong>facebook</strong>
                                    </p>
                                </a>
                                <a href=""
                                    class="twitter text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-twitter pe-4"></i>
                                    <p class="signVia">login with <strong>twitter</strong>
                                    </p>
                                </a>
                            </div>
                            <div class="or_container">
                                <div class="line_separator"></div>
                                <div class="or_label">or</div>
                                <div class="line_separator"></div>
                            </div>
                            <form class="mb-4" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php include 'message.php' ?>
                                <div class="form-group">
                                    <label for="first_name" class="label-control">First Name</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-user fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="text" name="first_name"
                                            id="first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="last_name" class="label-control">Last Name</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-user fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="text" name="last_name"
                                            id="last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="username" class="label-control">Username</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-user fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="text" name="username"
                                            id="username" placeholder="Enter Username" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="password" class="label-control">Password</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-lock fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="password" name="password"
                                            id="password" placeholder="Enter Password" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="confirm_password" class="label-control">Confirm Password</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-lock fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="password"
                                            name="confirm_password" id="confirm_password"
                                            placeholder="Re-Enter Password" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email" class="label-control">Email</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-envelope fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="email" name="email"
                                            id="email" placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="contact_no" class="label-control">Contact No</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-phone fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="text" name="contact_no"
                                            id="contact_no" placeholder="01### ######" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="image">Profile Pic</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-address-card fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="file" name="image"
                                            id="image" accept="image/jpg, image/png, image/jpeg" required>
                                    </div>
                                </div>

                                <button class="submit_btn btn mt-4 mb-5 fs-3 px-5 w-100" type="submit"
                                    name="register_btn">Register Now</button>
                                <p class="no_account text-center pt-4">Have an account? <a class="text-success"
                                        href="login.php">Login Now</a>
                                </p>
                            </form>

                            <?php
                            } else {
                            ?>

                            <h1 class="text-center mb-4">User Login</h1>
                            <div class="signInWith">
                                <a href=""
                                    class="google text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-google pe-4"></i>
                                    <p class="signVia">login with <strong>google</strong>
                                    </p>
                                </a>
                                <a href=""
                                    class="facebook text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-facebook pe-4"></i>
                                    <p class="signVia">login with <strong>facebook</strong>
                                    </p>
                                </a>
                                <a href=""
                                    class="twitter text-decoration-none d-flex align-items-center px-4 py-1 fs-3 mb-4">
                                    <i class="fa-brands fa-twitter pe-4"></i>
                                    <p class="signVia">login with <strong>twitter</strong>
                                    </p>
                                </a>
                            </div>
                            <div class="or_container">
                                <div class="line_separator"></div>
                                <div class="or_label">or</div>
                                <div class="line_separator"></div>
                            </div>
                            <form class="mb-4" action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                <?php include 'message.php' ?>
                                <div class="form-group">
                                    <label for="admin_email" class="label-control">Email</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-user fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="email" name="email"
                                            id="admin_email" placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="admin_pass" class="label-control">password</label>
                                    <div class="input_icon d-flex align-items-center">
                                        <i class="fa-solid fa-lock fs-3 px-4"></i>
                                        <input class="form-control fs-4 border-0 input" type="password" name="password"
                                            id="admin_pass" placeholder="Enter Password" required>
                                    </div>
                                </div>
                                <button class="submit_btn btn mt-4 fs-3 px-5 w-100" type="submit" name="login_btn">Login
                                    Now</button>
                                <div class="remember_forgot d-flex justify-content-between mt-4 mb-5">
                                    <div class="remember_me">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember me </label>
                                    </div>
                                    <div class="forgot_pass">
                                        <p>
                                            <a class="forgot_text text-decoration-none text-danger" href="#">Forgot
                                                password?</a>
                                        </p>
                                    </div>
                                </div>
                                <p class="no_account text-center pt-4">Don't have an account? <a class="text-success"
                                        href="login.php?action=user-registration">Register Now</a>
                                </p>
                            </form>

                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</html>