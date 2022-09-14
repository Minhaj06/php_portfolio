<!-- blogs section starts here -->
<section id="projects">
    <div class="inner_blog container vertical_path">
        <div class="content">
            <h2 class="heading"><?= $select['project_title'] ?></h2>
            <p class="para"><?= $select['project_desc'] ?></p>
        </div>

        <div class="blogs row g-5 mt-5">
            <?php
            $blog_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `created_at` FROM `blog_posts` WHERE status = '1' ORDER BY id DESC LIMIT 6");

            if (mysqli_num_rows($blog_post_query) > 0) {
                while ($blog_post_result = mysqli_fetch_array($blog_post_query)) {
            ?>

            <div class="col-xl-4 col-md-6">
                <div class="blog_item">
                    <div class="blog_img">
                        <a href="<?php base_url("post.php?slug=" . $blog_post_result['slug']) ?>">
                            <img src="<?php base_url("uploaded_img/" . $blog_post_result['image']) ?>" alt="blog_img" />
                        </a>
                    </div>
                    <div class="blog_content">
                        <p class="para">
                            <?php
                                    $timestamp =  $blog_post_result['created_at'];
                                    $date = date("M d, Y", strtotime($timestamp));
                                    echo $date;
                                    ?>
                        </p>

                        <h3><?= $blog_post_result['title'] ?></h3>

                        <a href="<?php base_url("post.php?slug=" . $blog_post_result['slug']) ?>">learn more<i
                                class="fa-solid fa-arrow-right-long"></i></a>
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