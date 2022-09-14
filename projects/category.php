<?php
include '../admin/config/dbConnect.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $category_query = mysqli_query($conn, "SELECT * FROM `project_categories` WHERE slug = '$slug' ");

    $count_post = mysqli_num_rows($category_query);

    if ($count_post > 0) {
        $category = mysqli_fetch_assoc($category_query)['name'];
    } else {
        $category = "";
    }
} else {
    $count_post = 0;
}

if (isset($category)) {
    $title = $category;
} else {
    $title = "Post not found";
}

function postDate($timestamp)
{
    $date = date("M d, Y", strtotime($timestamp));
    echo $date;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../assets/includes/meta_links_scripts.php"); ?>
    <title> <?= $title ?> || Coder</title>
</head>

<body>
    <?php include_once("../assets/includes/preloader.php") ?>
    <?php include_once("../assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs" style="margin-top: 12rem;">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-7 col-xl-8 mb-5 mb-lg-0">

                    <?php if ($count_post > 0) {
                    ?>
                    <h2 class="widget_title mb-5">category: <?= $category ?></h2>

                    <?php
                        $cat_wise_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `description`, `created_at` FROM `project_posts` WHERE `category` ='$category'");

                        if (mysqli_num_rows($cat_wise_post_query) > 0) {
                            while ($cat_wise_post_result = mysqli_fetch_array($cat_wise_post_query)) {
                        ?>
                    <div class="category_wise_post mb-5 pb-4">
                        <a href="<?php base_url("post.php?slug=" . $cat_wise_post_result['slug']) ?>">
                            <img style="max-height: 50rem;"
                                src="<?php base_url("uploaded_img/" . $cat_wise_post_result['image']) ?>" width="100%"
                                alt="post image">
                        </a>
                        <a href="<?php base_url("post.php?slug=" . $cat_wise_post_result['slug']) ?>">
                            <h2 style="font-weight: 300;" class="post_title my-4"><?= $cat_wise_post_result['title'] ?>
                            </h2>
                        </a>

                        <p style="font-weight: 300" class="fs-4 mb-4">
                            <span class="post_date me-3"><i class="fa-solid fa-calendar-days"></i>
                                <?php postDate($cat_wise_post_result['created_at']) ?></span>
                        </p>

                        <div class="post_description mb-4">
                            <?php
                                        $string = $cat_wise_post_result['description'];
                                        if (strlen($string) > 500) {

                                            $stringCut = substr($string, 0, 500);
                                            $endPoint = strrpos($stringCut, ' ');

                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= ' <a href="post.php?slug=' . $cat_wise_post_result['slug'] . '">[...]</a>';

                                            echo $string;
                                        } else {
                                            echo $string;
                                        }
                                        ?>
                        </div>

                        <a href="<?php base_url("projects/post.php?slug=" . $cat_wise_post_result['slug']) ?>"
                            class="d-inline-block fs-2 widget_title rounded px-4 py-2 continue_reading_btn">
                            <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                            Continue Reading
                        </a>

                        <hr>

                    </div>
                    <?php }
                        } ?>

                    <?php } else {
                        include "inc/post_not_found.php";
                    } ?>


                </main>


                <!-- Right aside section Starts here -->
                <aside class="col-lg-5 col-xl-4">
                    <?php include_once("inc/project_aside.php") ?>
                </aside>
                <!-- Right aside section ends here -->
            </div>
        </div>
    </section>
    <?php include_once("../assets/includes/footer.php") ?>
</body>

</html>