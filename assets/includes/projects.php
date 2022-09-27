<!-- blogs section starts here -->
<section id="projects">
    <div class="inner_blog container vertical_path">
        <div class="content">
            <h2 class="heading"><?= $select['project_title'] ?></h2>
            <p class="para"><?= $select['project_desc'] ?></p>
        </div>

        <div class="blogs row g-5 mt-5">
            <?php
            $project_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `description`, `image`, `created_at`, `category`, `code_file` FROM `project_posts` WHERE status = '1' ORDER BY id DESC LIMIT 6");

            if (mysqli_num_rows($project_post_query) > 0) {
                while ($project_post_result = mysqli_fetch_array($project_post_query)) {

                    $category = $project_post_result["category"];
                    if (strtolower($category) != 'uncategorized') {
                        $category_slug = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `slug` FROM `project_categories` WHERE name = '$category' "))['slug'];
                    } else {
                        $category_slug = "javascript: void(0)";
                    }
            ?>

            <div class="col-xl-6">
                <div class="blog_item row g-0 h-100">

                    <div class="col-4 overflow-hidden">
                        <a href="<?php base_url("projects/post.php?slug=" . $project_post_result['slug']) ?>">
                            <img src="<?php base_url("uploaded_img/" . $project_post_result['image']) ?>"
                                alt="project_img" />
                        </a>
                    </div>

                    <div class="blog_content p-4 col-8">

                        <div class="d-flex justify-content-between">
                            <a class="fs-5 text-capitalize mb-3"
                                href="<?php base_url("projects/category.php?slug=" . $category_slug) ?>">
                                <i class="fa-solid fa-cube fs-5 ms-0 me-3"></i>
                                <?= $project_post_result['category'] ?>
                            </a>

                            <h5>
                                <?php
                                        $timestamp =  $project_post_result['created_at'];
                                        $date = date("M d, Y", strtotime($timestamp));
                                        echo $date;
                                        ?>
                            </h5>
                        </div>

                        <a href="<?php base_url("projects/post.php?slug=" . $project_post_result['slug']) ?>">
                            <h2><?= $project_post_result['title'] ?></h2>
                        </a>

                        <p>
                            <?php
                                    $string = $project_post_result['description'];
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
                                    if (!empty($project_post_result['code_file'])) {
                                        if (isset($_SESSION['auth_user'])) {
                                    ?>

                            <div class="downloads_counter d-inline-block ms-3">
                                <span><i class="fa-sharp fa-solid fa-download"></i></span>
                                Downloads: 952
                            </div>

                            <a download="<?= $project_post_result['code_file'] ?>"
                                href="assets/files/<?= $project_post_result['code_file'] ?>"
                                class="download_btn px-3 py-1 fs-4 d-inline-block ms-3">Download</a>

                            <?php } else { ?>

                            <a href="login.php" class="download_btn px-3 py-1 fs-4 d-inline-block ms-3">Download</a>

                            <?php }
                                    } ?>


                        </div>



                    </div>

                </div>
            </div>

            <?php }
            } ?>
        </div>

        <div class="text-center mt-5 pt-5">
            <a href="<?php base_url("projects/index.php") ?>"><button class="button">view all</button></a>
        </div>

    </div>
</section>
<!-- blogs section ends here -->