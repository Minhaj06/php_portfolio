<?php
include_once 'config/dbConnect.php';

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth_role'] != "1") {
        $_SESSION['message'] = "You are not Authorised as ADMIN";
        header("Location: ../");
        exit(0);
    }
}

if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Login to access Dashboard";
    header("Location: ../user/login");
    exit(0);
}
?>

<?php include_once 'assets/includes/meta_links_scripts.php' ?>


<?php include_once("assets/includes/sidebar.php") ?>

<!-- main content starts here -->

<?php
include_once("assets/includes/header.php");
include_once("assets/includes/alertBox.php");
?>
<main class="main" id="main">
    <?php

    if (isset($view)) {
        if ($view == "dashboard") {

            include_once("views/dash_view.php");
        } elseif ($view == "view_register") {

            include_once("views/register_view.php");
        } elseif ($view == "home_update") {

            include_once("views/home_view.php");
        } elseif ($view == "about_update") {

            include_once("views/about_view.php");
        } elseif ($view == "services_update") {

            include_once("views/services_view.php");
        } elseif ($view == "achievements_update") {

            include_once("views/achievements_view.php");
        } elseif ($view == "portfolio_update") {

            include_once("views/portfolio_view.php");
        } elseif ($view == "project") {

            include_once("views/project_view.php");
        } elseif ($view == "project_comments") {

            include_once("views/project_comments_view.php");
        } elseif ($view == "blog") {

            include_once("views/blog_view.php");
        } elseif ($view == "blog_comments") {
            include_once("views/blog_comments_view.php");
        } elseif ($view == "testimonials_update") {

            include_once("views/testimonials_view.php");
        } elseif ($view == "hire_me_update") {

            include_once("views/hire_me_view.php");
        } elseif ($view == "site_settings") {
            include_once("views/site_settings_view.php");
        } else {
            include_once("views/404_view.php");
        }
    }

    ?>
    <?php
    include_once("assets/includes/footer.php");
    include_once("assets/includes/message.php");
    include_once("assets/includes/confirmBox.php");
    ?>