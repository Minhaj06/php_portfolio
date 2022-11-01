<?php
if (!isset($title)) {
    $title = "Coder || Advanced Thinking";
}
if (!isset($meta_title)) {
    $meta_title = "Blog and project sharing website";
}
if (!isset($meta_description)) {
    $meta_description = "This is my personal portfolio, blog and project sharing website. Here I will share my all portfolios, projects and blogs";
}
if (!isset($meta_keywords)) {
    $meta_keywords = "programming, technologoy, tech news, html, css, bootstrap, tailwind, javascript, jquery, react, react native, angular, php, laravel, codeigniter, nodejs, expressjs, python, c, c++, c#, java, dart, flutter";
}
if (!isset($og_url)) {
    $og_url = "";
}
if (!isset($og_title)) {
    $og_title = $meta_title;
}
if (!isset($og_description)) {
    $og_description = $meta_description;
}
if (!isset($og_image_path)) {
    $og_image_path = "assets/images/robot.png";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  -->
    <meta name="title" content="<?= $meta_title ?>">
    <meta name="description" content="<?= $meta_description ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">

    <!--  -->
    <meta property="og:url" content="<?php base_url($og_url) ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $og_title ?>" />
    <meta property="og:description" content="<?= $og_description ?>" />

    <!-- image -->
    <meta property="og:image" content="<?php base_url($og_image_path) ?>" />
    <meta property="og:image:secure_url" content="<?php base_url($og_image_path) ?>" />
    <link rel="image_src" href="<?php base_url($og_image_path) ?>">


    <link rel="icon" type="image/x-icon" href="<?php base_url("assets/images/favicon.ico") ?>" />

    <!-- swiper js cdn link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap"
        rel="stylesheet" />

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Code Highlight CSS CDN -->
    <link rel="stylesheet" href="<?php base_url("assets/css/prism.css") ?>">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" type="text/css" href="<?php base_url("assets/css/style.php") ?>" />


    <!-- Bootstrap Bundle with Propper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- swiper js cdn link -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Code Highlight JS CDN -->
    <script src="<?php base_url("assets/js/prism.js") ?>"></script>

    <!-- Custom JavaScript -->
    <script defer src="<?php base_url("assets/JS/script.js") ?>"></script>

    <?php
    if (!isset($title)) {
        $title = "Coder || Advancded Thinking";
    }
    ?>

    <title><?= $title ?></title>