<?php
include 'admin/config/dbConnect.php';

$query = mysqli_query($conn, "SELECT * FROM `home`, `about`, `service_section`, `portfolio_section`, `project_section`, `testimonial_section`, `hire`, `blog_section` ") or die('Query failed');
// $query = mysqli_query($conn, "SELECT * FROM `home`, `about`, `skills`, `service_section`, `service_items` ") or die('Query failed');

$select = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("assets/includes/meta_links_scripts.php"); ?>
    <title>Coder || Advanced Thinking</title>
</head>

<body class="line-numbers">

    <?php
    // $home_index = base_url("");
    include_once("assets/includes/preloader.php");
    include_once("assets/includes/navbar.php");
    include_once("assets/includes/home.php");
    include_once("assets/includes/about.php");
    include_once("assets/includes/services.php");
    include_once("assets/includes/achivements.php");
    include_once("assets/includes/portfolio.php");
    include_once("assets/includes/projects.php");
    include_once("assets/includes/testimonials.php");
    include_once("assets/includes/hire_me.php");
    include_once("assets/includes/blogs.php");
    include_once("assets/includes/footer.php")
    ?>

</body>

</html>