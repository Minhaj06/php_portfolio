<?php
include '../admin/config/dbConnect.php';

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
    <title>Coder || Projects</title>
</head>

<body>
    <?php include_once("../assets/includes/preloader.php") ?>
    <?php include_once("../assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs" style="margin-top: 13rem;">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-8 mb-5 mb-lg-0">
                    <div class="row g-5 g-md-4 g-xl-5">

                        <?php
                        $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `project_posts` WHERE status = '1'"));

                        $limit = 1;
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

                        $post_query = mysqli_query($conn, "SELECT * FROM `project_posts` WHERE status = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset");

                        if (mysqli_num_rows($post_query) > 0) {
                            while ($post_result = mysqli_fetch_array($post_query)) {
                        ?>

                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_img">
                                    <a href="<?php base_url("projects/post.php?slug=" . $post_result['slug']) ?>">
                                        <img src="<?php base_url("uploaded_img/" . $post_result['image']) ?>"
                                            alt="blog_img" />
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <p class="para">
                                        <?php
                                                $timestamp =  $post_result['created_at'];
                                                $date = date("M d, Y", strtotime($timestamp));
                                                echo $date;
                                                ?>
                                    </p>
                                    <h3><?= $post_result['title'] ?></h3>
                                    <a href="<?php base_url("projects/post.php?slug=" . $post_result['slug']) ?>">learn
                                        more<i class="fa-solid fa-arrow-right-long"></i></a>
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
                <aside class="col-lg-4">

                    <?php include_once("inc/project_aside.php") ?>

                </aside>
                <!-- Right aside section ends here -->



            </div>



        </div>

    </section>



    <?php include_once("../assets/includes/footer.php") ?>
</body>

</html>