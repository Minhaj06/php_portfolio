<?php
include '../admin/config/dbConnect.php';

function postDate($timestamp)
{
    $date = date("M d, Y", strtotime($timestamp));
    echo $date;
}

$title = "Coder || Projects";
$og_url = "projects/index.php";
?>

<?php include_once("../assets/includes/head.php"); ?>

</head>

<body>
    <?php // include_once("../assets/includes/preloader.php") 
    ?>
    <?php include_once("../assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="main col-lg-8 mb-5 mb-lg-0">
                    <div class="row g-5">

                        <?php
                        $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `project_posts` WHERE status = '1'"));

                        $limit = 4;
                        $total_pages = ceil($total_records / $limit);

                        if (isset($_GET['page'])) {
                            $page_no = $_GET['page'];
                            $prev_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $offset = ($page_no - 1) * $limit;
                        } else {
                            $page_no = 1;
                            $offset = 0;
                            $prev_page = 0;
                            $next_page = 2;
                        }

                        $post_query = mysqli_query($conn, "SELECT `title`, `slug`, `description`, `image`, `created_at`, `category`, `code_file` FROM `project_posts` WHERE status = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset");

                        if (mysqli_num_rows($post_query) > 0) {
                            while ($post_result = mysqli_fetch_array($post_query)) {
                        ?>


                        <div class="col-12">
                            <div class="blog_item row g-0 h-100">

                                <div class="col-4 overflow-hidden">
                                    <a href="<?php base_url("projects/post/" . $post_result['slug']) ?>">
                                        <img src="<?php base_url("uploaded_img/" . $post_result['image']) ?>"
                                            alt="project_img" />
                                    </a>
                                </div>

                                <div class="blog_content p-4 col-8">

                                    <div class="d-flex justify-content-between">
                                        <a class="fs-5 text-capitalize mb-3"
                                            href="<?php base_url("projects/category.php?slug=" . $category_slug) ?>">
                                            <i class="fa-solid fa-cube fs-5 ms-0 me-3"></i>
                                            <?= $post_result['category'] ?>
                                        </a>

                                        <h5>
                                            <?php
                                                    $timestamp =  $post_result['created_at'];
                                                    $date = date("M d, Y", strtotime($timestamp));
                                                    echo $date;
                                                    ?>
                                        </h5>
                                    </div>

                                    <a href="<?php base_url("projects/post/" . $post_result['slug']) ?>">
                                        <h2><?= $post_result['title'] ?></h2>
                                    </a>

                                    <p>
                                        <?php
                                                $string = $post_result['description'];
                                                if (strlen($string) > 80) {

                                                    $stringCut = substr($string, 0, 80);
                                                    $endPoint = strrpos($stringCut, ' ');

                                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                    $string .= '....';

                                                    echo $string;
                                                } else {
                                                    echo $string;
                                                }
                                                ?>
                                    </p>


                                    <div class="comment_download_counter text-end mt-4">

                                        <div class="comments_counter d-inline-block">
                                            <span><i class="fa-solid fa-comment"></i></span> 17
                                        </div>

                                        <?php
                                                if (!empty($post_result['code_file'])) {
                                                    if (isset($_SESSION['auth_user'])) {
                                                ?>

                                        <div class="downloads_counter d-inline-block ms-3">
                                            <span><i class="fa-sharp fa-solid fa-download"></i></span>
                                            Downloads: 952
                                        </div>

                                        <a download="<?= $post_result['code_file'] ?>"
                                            href="assets/files/<?= $post_result['code_file'] ?>"
                                            class="download_btn px-3 py-1 fs-4 d-inline-block ms-3">Download</a>

                                        <?php } else { ?>

                                        <div class="downloads_counter d-inline-block ms-3">
                                            <span><i class="fa-sharp fa-solid fa-download"></i></span>
                                            Downloads: 952
                                        </div>

                                        <a href="login.php"
                                            class="download_btn px-3 py-1 fs-4 d-inline-block ms-3">Download</a>

                                        <?php }
                                                } ?>


                                    </div>



                                </div>

                            </div>
                        </div>


                        <?php }
                        } ?>



                    </div>

                    <?php

                    if ($total_records > $limit) {

                        echo '<ul class="myPagination mt-5">';

                        if ($prev_page > 2) {
                            echo '<li><a class="page_prev" href="index.php?page=' . $prev_page . '"><i class="fa-solid fa-angles-left"></i><span> Prev</span></a></li>';
                        }

                        if ($total_pages > 4) {

                            if ($page_no > 3 && $page_no < $total_pages - 2) {

                                echo '<li><a class="" href="index.php?page=1">1</a></li>';
                                echo '<li><b>...</b></li>';
                                for ($i = $page_no - 1; $i <= $page_no + 1; $i++) {
                                    if ($i == $page_no) {
                                        echo '<li><a class="active" href="javascript: void(0)">' . $i . '</a></li>';
                                    } else {
                                        echo '<li><a class="" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                                echo '<li><b>...</b></li>';
                                echo '<li><a class="" href="index.php?page=' . $total_pages . '">' . $total_pages . '</a></li>';
                            } elseif ($page_no <= 3) {

                                for ($i = 1; $i <= 3; $i++) {
                                    if ($i == $page_no) {
                                        echo '<li><a class="active" href="javascript: void(0)">' . $i . '</a></li>';
                                    } else {
                                        echo '<li><a class="" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                                echo '<li><b>...</b></li>';
                                echo '<li><a class="" href="index.php?page=' . $total_pages . '">' . $total_pages . '</a></li>';
                            } else {

                                echo '<li><a class="" href="index.php?page=1">1</a></li>';
                                echo '<li><b>...</b></li>';
                                for ($i = $total_pages - 2; $i <= $total_pages; $i++) {
                                    if ($i == $page_no) {
                                        echo '<li><a class="active" href="javascript: void(0)">' . $i . '</a></li>';
                                    } else {
                                        echo '<li><a class="" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                            }
                        } else {

                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $page_no) {
                                    echo '<li><a class="active" href="javascript: void(0)">' . $i . '</a></li>';
                                } else {
                                    echo '<li><a class="" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                        }

                        if ($next_page + 1 < $total_pages) {
                            echo '<li><a class="page_next" href="index.php?page=' . $next_page . '"><span>Next </span><i class="fa-solid fa-angles-right"></i></a></li>';
                        }

                        echo '</ul>';
                    }
                    ?>

                </main>


                <!-- Right aside section Starts here -->
                <aside class="aside col-lg-4">

                    <?php include_once("inc/project_aside.php") ?>

                </aside>
                <!-- Right aside section ends here -->



            </div>



        </div>

    </section>



    <?php include_once("../assets/includes/footer.php") ?>
</body>

</html>