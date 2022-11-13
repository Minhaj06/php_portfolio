<?php
$conn = mysqli_connect("localhost", "root", "", "coder");
?>

<!-- Search bar -->
<h2 class="widget_title">Search Here</h2>
<form action="<?php base_url("projects/search.php") ?>" method="GET">
    <div class="input-group mb-5 pb-4">
        <input type="search" name="keywords" class="form-control rounded fs-3 px-3" placeholder="Search project"
            aria-label="Search" />
        <input type="submit" value="Search" class="btn fs-3 search_btn" />
    </div>
</form>


<!-- Recent post and comment tab -->
<div class="recent_post_comment mb-5">
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item active"><button class="nav-link active" data-bs-toggle="tab"
                data-bs-target="#recent_post">Recent Posts</button>
        </li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#recent_comment">Recent
                Comments</button>
        </li>
    </ul>


    <div class="tab-content">
        <!-- recent posts -->
        <div id="recent_post" class="tab-pane active">

            <?php
            $recent_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `created_at` FROM `project_posts` WHERE status = '1' ORDER BY id DESC LIMIT 5");

            if (mysqli_num_rows($recent_post_query) > 0) {
                while ($recent_post_result = mysqli_fetch_array($recent_post_query)) {
            ?>

            <div class="recent_post d-flex mb-4">
                <div class="recent_post_img me-3 overflow-hidden">
                    <a href="<?php base_url("projects/post/" . $recent_post_result['slug']) ?>">
                        <img width="100" height="70"
                            src="<?php base_url("uploaded_img/" . $recent_post_result['image']) ?>" alt="post image">
                    </a>
                </div>
                <div class="recent_post_content">
                    <a href="<?php base_url("projects/post/" . $recent_post_result['slug']) ?>">
                        <p class="recent_post_title fs-4"><?= $recent_post_result['title'] ?></p>
                    </a>
                    <p class="recent_post_date fs-5"><?php postDate($recent_post_result['created_at']) ?></p>
                </div>
            </div>

            <?php
                }
            }
            ?>

        </div>

        <!-- recent comments -->
        <div id="recent_comment" class="tab-pane fade">

            <?php
            $recent_comment_query = mysqli_query($conn, "SELECT * FROM `project_comments` ORDER BY comment_id DESC LIMIT 5");

            if (mysqli_num_rows($recent_comment_query) > 0) {
                while ($recent_comment_result = mysqli_fetch_array($recent_comment_query)) {
                    $commenter_id = $recent_comment_result['user_id'];
                    $blog_id = $recent_comment_result['blog_id'];

                    $commenter_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `first_name`, `last_name`, `image` FROM `users_info` WHERE id = '$commenter_id' "));
                    $post_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `title`, `slug` FROM `project_posts` WHERE id = '$blog_id' "));
            ?>

            <div class="recent_comment d-flex mb-4">
                <div class="recent_comment_img me-3">
                    <img width="100" height="70" src="<?php base_url("uploaded_img/" . $commenter_data['image']) ?>"
                        alt="commenter image" title="Commeter Image">
                </div>
                <div class="recent_comment_content">
                    <div class="recent_commenter_username fs-5 mb-2">
                        <strong
                            title="Commenter Name"><?= $commenter_data['first_name'] . " " . $commenter_data['last_name'] ?></strong>
                        commented
                        on
                        <a href="<?php base_url("projects/post/" . $post_data['slug']) ?>" style="color: var(--orange);"
                            class="commented_post_title"><?= $post_data['title'] ?></a>:
                        <span class="comment">
                            <?php
                                    $string = $recent_comment_result['comment'];
                                    if (strlen($string) > 100) {

                                        $stringCut = substr($string, 0, 100);
                                        $endPoint = strrpos($stringCut, ' ');

                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= " ...";

                                        echo $string;
                                    } else {
                                        echo $string;
                                    }
                                    ?>
                        </span>
                    </div>
                    <p class="recent_comment_date fs-5 mb-0"><?php postDate($recent_comment_result['created_at']) ?></p>
                </div>
            </div>

            <?php }
            } ?>

        </div>
    </div>
</div>


<!-- Categories -->
<div class="categories mb-5">
    <h2 class="widget_title">Categories</h2>
    <ul class="text-capitalize">

        <?php
        if (isset($_GET['slug'])) {
            $cat_slug = $_GET['slug'];
        } else {
            $cat_slug = "";
        }

        $category_query = mysqli_query($conn, "SELECT `name`, `slug`, `no_of_post` FROM `project_categories` WHERE status = '1' AND no_of_post > 0 ORDER BY id DESC");

        if (mysqli_num_rows($category_query) > 0) {
            while ($category_result = mysqli_fetch_array($category_query)) {

                if ($cat_slug == $category_result['slug']) {
                    $active = "active";
                } else {
                    $active = "";
                }
        ?>

        <li class="<?= $active ?>">
            <a href="<?php base_url("projects/category/" . $category_result['slug']) ?>"
                class="d-flex justify-content-between">
                <span><?= $category_result['name'] ?></span>
                <span>(<?= $category_result['no_of_post'] ?>)</span>
            </a>
        </li>

        <?php }
        } ?>

    </ul>
</div>


<!-- Facebook Page Plugin -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0&appId=750629119040166&autoLogAppEvents=1"
    nonce="e26vHkB4"></script>

<div style="overflow-x: auto;" class="facebook_page" id="">
    <h2 class="widget_title">Our Facebook Page</h2>
    <div style="min-width: 400px;" class="fb-page" data-href="https://www.facebook.com/mindthegraph/"
        data-tabs="timeline, events" data-width="500" data-height="" data-small-header="false"
        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/mindthegraph/" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/mindthegraph/">Mind the Graph</a></blockquote>
    </div>
</div>