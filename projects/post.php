<?php
include '../admin/config/dbConnect.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $single_post_query = mysqli_query($conn, "SELECT * FROM `project_posts` WHERE slug = '$slug' ");
    $count_post = mysqli_num_rows($single_post_query);

    if ($count_post > 0) {
        $single_post_result = mysqli_fetch_assoc($single_post_query);

        $category = $single_post_result["category"];
        if (strtolower($category) != 'uncategorized') {
            $category_slug = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `slug` FROM `project_categories` WHERE name = '$category' "))['slug'];
        } else {
            $category_slug = "";
        }

        if ($category_slug == "") {
            $category_slug = "javascript: void(0)";
        } else {
            $category_slug = "category.php?slug=" . $category_slug;
        }
    }
} else {
    $count_post = 0;
}

if (isset($single_post_result['title']) && !empty($single_post_result['title'])) {
    $title = $single_post_result['title'] . " || Coder";
    $meta_title = $single_post_result['meta_title'];
    $meta_description = $single_post_result['meta_description'];
    $meta_keywords = $single_post_result['meta_keywords'];

    $og_url = "post.php?slug=" . $single_post_result['slug'];
    $og_title = $single_post_result['title'];
    $og_description = $single_post_result['meta_description'];
    $og_image_path = "uploaded_img/" . $single_post_result['image'];
} else {
    $title = "Post not found! || Coder";
}

function postDate($timestamp)
{
    $date = date("M d, Y", strtotime($timestamp));
    echo $date;
}
?>

<?php include_once("../assets/includes/head.php"); ?>
</title>
</head>

<body class="line-numbers">
    <?php include_once("../assets/includes/preloader.php") ?>
    <?php include_once("../assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-7 col-xl-8 mb-5 mb-lg-0">

                    <!-- Singel post view -->
                    <div class="single_post_view">
                        <!-- post details -->
                        <?php

                        if ($count_post > 0) {
                        ?>
                        <div class="post_details">
                            <img style="max-height: 50rem;"
                                src="<?php base_url("uploaded_img/" . $single_post_result['image']) ?>" width="100%"
                                alt="post image">

                            <h2 style="font-weight: 300;" class="post_title my-4"><?= $single_post_result['title'] ?>
                            </h2>

                            <a href="<?php base_url("projects/" . $category_slug) ?>">
                                <h4 style="background: var(--orange); color: var(--black)"
                                    class="post_category d-inline-block px-4 py-3 fs-3 rounded mb-3 text-capitalize">
                                    <?= $single_post_result['category'] ?></h4>
                            </a>

                            <p style="font-weight: 300" class="fs-4 mb-4">
                                <span class="post_date me-3"><i class="fa-solid fa-calendar-days"></i>
                                    <?php
                                        postDate($single_post_result['created_at']);
                                        ?>
                                </span>

                                <a href="<?php base_url("") ?>"><i class="fa-solid fa-comment"></i> Leave A Comment</a>
                            </p>

                            <div class="post_description mb-5 pb-4">

                                <!-- Description -->
                                <p><?= $single_post_result['description'] ?></p>

                                <!-- Source Code -->
                                <div class="code_area_wrapper">


                                    <!-- HTML Code -->
                                    <?php
                                        if (!empty($single_post_result['html_code'])) {
                                        ?>

                                    <div class="code_area my-5">

                                        <h2 class="widget_title"
                                            style="color: var(--orange); font-family: 'Comic Sans MS';">HTML Code
                                        </h2>
                                        <pre><code class="language-html"><?= $single_post_result['html_code'] ?></code></pre>
                                    </div>
                                    <?php   }
                                        ?>


                                    <!-- CSS Code -->
                                    <?php
                                        if (!empty($single_post_result['css_code'])) {
                                        ?>

                                    <div class="code_area my-5">

                                        <h2 class="widget_title"
                                            style="color: var(--orange); font-family: 'Comic Sans MS';">CSS Code
                                        </h2>
                                        <pre><code class="language-css"><?= $single_post_result['css_code'] ?></code></pre>
                                    </div>
                                    <?php   }
                                        ?>


                                    <!-- JS Code -->
                                    <?php
                                        if (!empty($single_post_result['js_code'])) {
                                        ?>

                                    <div class="code_area my-5">

                                        <h2 class="widget_title"
                                            style="color: var(--orange); font-family: 'Comic Sans MS';">JavaScript Code
                                        </h2>
                                        <pre><code class="language-js"><?= $single_post_result['js_code'] ?></code></pre>
                                    </div>
                                    <?php   }
                                        ?>


                                    <!-- PHP Code -->
                                    <?php
                                        if (!empty($single_post_result['php_code'])) {
                                        ?>

                                    <div class="code_area my-5">

                                        <h2 class="widget_title"
                                            style="color: var(--orange); font-family: 'Comic Sans MS';">PHP Code
                                        </h2>
                                        <pre><code class="language-php"><?= $single_post_result['php_code'] ?></code></pre>
                                    </div>
                                    <?php   }
                                        ?>


                                    <!-- Download Button -->
                                    <?php
                                        if (!empty($single_post_result['code_file'])) {
                                            if (isset($_SESSION['auth_user'])) {
                                        ?>

                                    <div class="text-center mt-5">
                                        <a download="<?= $single_post_result['code_file'] ?>"
                                            href="../assets/files/<?= $single_post_result['code_file'] ?>"
                                            class="download_btn"><span class="me-2"><i
                                                    class="fa-sharp fa-solid fa-download"></i></span>Source
                                            Codes</a>
                                    </div>
                                    <?php
                                            } else {
                                            ?>

                                    <div class="text-center mt-5">
                                        <a href="<?php base_url("login.php") ?>" class="download_btn"><span
                                                class="me-2"><i class="fa-sharp fa-solid fa-download"></i></span>Source
                                            Codes</a>
                                    </div>

                                    <?php }
                                        }
                                        ?>



                                </div>


                            </div>
                        </div>


                        <!-- Post Share Options -->
                        <div class="post_share_option mb-5 pb-4">
                            <h1 class="widget_title">Share On</h1>

                            <div class="row g-3 g-xl-4">
                                <style>
                                .post_share_option .btn {
                                    padding: .2rem .75rem;
                                }

                                .post_share_option a:hover {
                                    opacity: .8;
                                }
                                </style>
                                <div class="col">
                                    <a style="color: #FFF; background: #4267B2;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                </div>

                                <div class="col">
                                    <a style="color: #FFF; background: #9A30ED;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-facebook-messenger"></i></a>
                                </div>

                                <div class="col">
                                    <a style="color: #FFF; background: #25D366;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                </div>

                                <div class="col">
                                    <a style="color: #FFF; background: #00acee;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-twitter"></i></a>
                                </div>

                                <div class="col">
                                    <a style="color: #FFF; background: #3f729b;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-instagram"></i></a>
                                </div>

                                <div class="col">
                                    <a style="color: #FFF; background: #E60023;" href="#" class="btn d-block fs-1"><i
                                            class="fa-brands fa-pinterest-p"></i></a>
                                </div>

                            </div>

                        </div>


                        <!-- Related Posts -->
                        <h1 class="widget_title">related posts</h1>

                        <div class="row g-4">
                            <?php
                                $related_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `created_at` FROM `project_posts` WHERE status = '1' AND `category` = '$category' AND `slug` != '$slug' ORDER BY id DESC");

                                if (mysqli_num_rows($related_post_query) > 0) {
                                    while ($related_post_result = mysqli_fetch_array($related_post_query)) {
                                ?>

                            <div class="col-md-6">
                                <div class="blog_item">
                                    <div class="blog_img">
                                        <a
                                            href="<?php base_url("projects/post.php?slug=" . $related_post_result['slug']) ?>">
                                            <img src="<?php base_url("uploaded_img/" . $related_post_result['image']) ?>"
                                                alt="blog_img" />
                                        </a>
                                    </div>
                                    <div class="blog_content">
                                        <p class="para"><?php postDate($related_post_result['created_at']) ?></p>
                                        <h3><?= $related_post_result['title'] ?></h3>
                                        <a
                                            href="<?php base_url("projects/post.php?slug=" . $related_post_result['slug']) ?>">learn
                                            more<i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>

                            <?php }
                                } else { ?>

                            <h1 class="text-center" style="color: var(--gray)">Oops! Related Posts Not Found!</h1>

                            <?php } ?>
                        </div>

                        <?php } else {
                            include "inc/post_not_found.php";
                        } ?>

                    </div>




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