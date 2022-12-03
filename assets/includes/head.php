<?php
$site_info_query = mysqli_query($conn, "SELECT `site_title`, `site_title2`, `site_description`, `site_keywords`, `site_logo`, `og_title`, `og_description`, `og_url`, `og_image` FROM `site_settings`");

$site_info_result = mysqli_fetch_assoc($site_info_query);

if (!isset($title)) {
    $title = "Coder || Advanced Thinking";
}
if (!isset($meta_title)) {
    $meta_title = $site_info_result['og_title'];
}
if (!isset($meta_description)) {
    $meta_description = $site_info_result['og_description'];
}
if (!isset($meta_keywords)) {
    $meta_keywords = $site_info_result['site_keywords'];
}
if (!isset($og_url)) {
    $og_url = $site_info_result['og_url'];
}
if (!isset($og_title)) {
    $og_title = $meta_title;
}
if (!isset($og_description)) {
    $og_description = $meta_description;
}
if (!isset($og_imgae)) {
    $og_imgae = $site_info_result['og_image'];
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
    <meta property="og:image" content="<?php base_url('uploaded_img/' . $og_imgae) ?>" />
    <meta property="og:image:secure_url" content="<?php base_url('uploaded_img/' . $og_imgae) ?>" />
    <link rel="image_src" href="<?php base_url('uploaded_img/' . $og_imgae) ?>">


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