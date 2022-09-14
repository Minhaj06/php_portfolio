<?php
include '../admin/config/dbConnect.php';

$slug = $_GET['slug'];
$single_post_query = mysqli_query($conn, "SELECT * FROM `blog_posts` WHERE slug = '$slug' ");
$single_post_result = mysqli_fetch_assoc($single_post_query);

$category = $single_post_result["category"];
if (strtolower($category) != 'uncategorized') {
    $category_slug = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `slug` FROM `blog_categories` WHERE name = '$category' "))['slug'];
} else {
    $category_slug = "";
}

if ($category_slug == "") {
    $category_slug = "javascript: void(0)";
} else {
    $category_slug = "category.php?slug=" . $category_slug;
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
    <title><?= $single_post_result['title'] ?></title>
</head>

<body class="line-numbers">
    <?php include_once("../assets/includes/preloader.php") ?>
    <?php include_once("../assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs" style="margin-top: 12rem;">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-7 col-xl-8 mb-5 mb-lg-0">

                    <!-- Singel post view -->
                    <div class="single_post_view">
                        <!-- post details -->
                        <div class="post_details">
                            <img style="max-height: 50rem;"
                                src="<?php base_url("uploaded_img/" . $single_post_result['image']) ?>" width="100%"
                                alt="post image">

                            <h2 style="font-weight: 300;" class="post_title my-4"><?= $single_post_result['title'] ?>
                            </h2>

                            <a href="<?php base_url("projects/" . $category_slug) ?>">
                                <h4 style="background: var(--orange); color: var(--black)"
                                    class="post_category d-inline-block py-3 px-4 fs-3 rounded mb-3 text-capitalize">
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


                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt eligendi facilis ad
                                expedita nam repellendus, dolorum ab. Veritatis nobis architecto quaerat assumenda neque
                                voluptatem eligendi nesciunt distinctio, nam eum? Unde beatae aut eum asperiores
                                perferendis consequuntur soluta, voluptas molestias. Debitis deserunt ducimus nostrum
                                libero rem beatae nobis inventore eius ea sint earum at doloremque soluta sunt,
                                explicabo et repellendus molestiae.


                                <!-- Code area -->
                                <div class="code_area my-5">
                                    <h2 style="color: var(--orange); font-family: 'Comic Sans MS';">HTML Code
                                    </h2>
                                    <!-- Code -->
                                    <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
    &lt;title&gt;Document&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;/body&gt;
&lt;/html&gt;</code></pre>
                                </div>


                                <!-- Code area -->
                                <div class="code_area my-5">
                                    <h2 style="color: var(--orange); font-family: 'Comic Sans MS';">CSS Code
                                    </h2>
                                    <!-- Code -->
                                    <pre><code class="language-css">*,
*::after,
*::before,
ul {
box-sizing: border-box;
padding: 0;
margin: 0;
transition: all 0.2s linear;
}

ul,
ol,
li {
padding: 0;
margin: 0;
list-style: none;
}

html {
font-size: 62.5%;
}

:root {
--white: #cccccc;
--black: #000;
--orange: #cc3a00;
--dark-gray: #111111;
--gray: #707070;
}

body {
background: var(--black);
font-family: "Poppins", sans-serif;
color: var(--white);
font-size: 1.6rem;
}
a {
color: var(--white);
text-decoration: none;
}
a:hover {
color: var(--orange);
}
#preloader {
position: fixed;
top: 0;
width: 100%;
height: 100vh;
background: #e9efef url(../images/loader.gif) no-repeat center center;
z-index: 999999;
opacity: 80%;
}

#page_desk {
background: var(--dark-gray);
padding: 4rem 0;
margin-top: 10rem;
}

section {
overflow: hidden;
padding-top: 10rem;
}

/* @media (min-width: 1600px) {
#navbar .container-fluid {
max-width: 96%;
}
}

@media (min-width: 1800px) {
#navbar .container-fluid {
max-width: 90%;
}
} */

@media (min-width: 1275px) {
.container {
max-width: 1250px;
}
}</code></pre>
                                </div>


                                <!-- Code area -->
                                <div class="code_area my-5">
                                    <h2 style="color: var(--orange); font-family: 'Comic Sans MS';">JavaScript Code
                                    </h2>
                                    <!-- Code -->
                                    <pre><code class="language-js">window.addEventListener("load", () => {
    document.getElementById("preloader").style.display = "none";
});

// menu ul container class add
let btn = document.querySelector(".menu_btn");
let menu = document.querySelector(".main_menu ul");
btn.addEventListener("click", () => {
    menu.classList.toggle("container");
});

// main menu link active
const menu_link = document.querySelectorAll(".menu_link");

menu_link.forEach((element) => {
    element.addEventListener("click", function () {
        menu_link.forEach((link) => link.classList.remove("active"));

        this.classList.add("active");
    });
});

// show main menu
let menuBtn = document.querySelector(".menu_btn");
let showNav = document.querySelector(".main_menu");

menuBtn.addEventListener("click", () => {
    showNav.classList.toggle("show");
});

window.onscroll = () => {
    showNav.classList.remove("show");
};</code></pre>
                                </div>


                                <!-- Code area -->
                                <div class="code_area my-5">
                                    <h2 style="color: var(--orange); font-family: 'Comic Sans MS';">PHP Code
                                    </h2>
                                    <!-- Code -->
                                    <pre><code class="language-php">$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `blog_posts` WHERE status = '1'"));

$limit = 6;
$total_pages = ceil($total_records / $limit);

if (isset($_GET['page'])) {
    $page_no = $_GET['page'];
    $prev_page = $page_no - 1;
    $next_page = $page_no + 1;
    $offset = ($page_no - 1) * $limit;
} else {
    $page_no = 0;
    $offset = 0;
    $prev_page = 0;
    $next_page = 2;
}

$post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `created_at` FROM `blog_posts` WHERE status = '1' ORDER BY id DESC LIMIT $limit OFFSET $offset");

if (mysqli_num_rows($post_query) > 0) {
    while ($post_result = mysqli_fetch_array($post_query)) {

        echo "Hello World";
    }
}</code></pre>
                                </div>





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
                                        class="fa-brands fa-twitter"></i></a>
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
                        $related_post_query = mysqli_query($conn, "SELECT `title`, `slug`, `image`, `created_at` FROM `blog_posts` WHERE status = '1' AND `category` = '$category' AND `slug` != '$slug' ORDER BY id DESC");

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

    <?php include_once("assets/includes/footer.php") ?>
</body>

</html>