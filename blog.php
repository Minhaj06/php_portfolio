<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("assets/includes/meta_links_scripts.php"); ?>
    <title>Coder || Blogs</title>

    <style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 5px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slide_item {
        position: relative;
        max-height: 35rem;
        overflow: hidden;
    }

    .slide_item:hover img {
        transform: scale(1.1) rotate(2deg);
    }


    .blog_item:hover .swiper_pagi_img img {
        transform: none;
    }

    .swiper-slide .slider_blog_content {
        position: absolute;
        background: #111111a1;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 1rem 2rem;
        text-align: start;
    }

    .swiper-slide .slider_blog_content p {
        font-size: 1.5rem;
    }

    .swiper-slide .slider_blog_content a {
        display: flex;
        align-items: center;
        gap: 1rem;
        text-decoration: none;
        color: var(--white);
    }

    .swiper-slide .slider_blog_content a:hover {
        color: var(--orange);
    }

    .swiper_pagi_img img {
        height: 10rem;
        cursor: pointer;
    }
    </style>

</head>

<body>
    <?php include_once("assets/includes/preloader.php") ?>
    <?php include_once("assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs" style="margin-top: 13rem;">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-8">
                    <div class="row g-0">
                        <div class="blog_item">

                            <div style="--swiper-navigation-color: var(--orange); --swiper-pagination-color: var(-orange)"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper">


                                    <div class="swiper-slide slide_item">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                        <div class="slider_blog_content">
                                            <p>26th August, 2022</p>
                                            <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                            <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>

                                    <div class="swiper-slide slide_item">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                        <div class="slider_blog_content">
                                            <p>26th August, 2022</p>
                                            <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                            <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>

                                    <div class="swiper-slide slide_item">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                        <div class="slider_blog_content">
                                            <p>26th August, 2022</p>
                                            <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                            <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>

                                    <div class="swiper-slide slide_item">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                        <div class="slider_blog_content">
                                            <p>26th August, 2022</p>
                                            <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                            <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper swiper_pagi_img">

                                    <div class="swiper-slide">
                                        <img src="img/robot.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/robot.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/robot.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/robot.jpg" />
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row g-5 mt-1">
                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_img">
                                    <a href="#">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <p class="para">26th August, 2022</p>
                                    <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                    <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_img">
                                    <a href="#">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <p class="para">26th August, 2022</p>
                                    <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                    <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_img">
                                    <a href="#">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <p class="para">26th August, 2022</p>
                                    <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                    <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="blog_item">
                                <div class="blog_img">
                                    <a href="#">
                                        <img src="img/robot.jpg" alt="blog_img" />
                                    </a>
                                </div>
                                <div class="blog_content">
                                    <p class="para">26th August, 2022</p>
                                    <h3>I Used The Web For A Day On A 50 MB Budget</h3>
                                    <a href="#">learn more<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
                <aside class="col-lg-4">

                    <!-- Search bar -->
                    <h1 class="mb-3" style="color: var(--orange)">Search Here</h1>
                    <div class="input-group mb-5 pb-4">
                        <input type="search" class="form-control rounded fs-3 px-3" placeholder="Search blog"
                            aria-label="Search" />
                        <button type="button" class="btn fs-3 search_btn">Search</button>
                    </div>

                    <!-- Recent post and comment tab -->
                    <div class="recent_post_comment mb-5">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item active"><button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#recent_post">Home</button>
                            </li>
                            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#recent_comment">Menu 1</button>
                            </li>
                        </ul>


                        <div class="tab-content">
                            <div id="recent_post" class="tab-pane active">
                                <h3>HOME</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div id="recent_comment" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="categories mb-5">
                        <h1 style="color: var(--orange)">Categories</h1>
                        <ul>
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">Bootstrap5</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JQuery</a></li>
                            <li><a href="#">Ajax</a></li>
                        </ul>
                    </div>



                    <!-- Facebook Page Plugin -->
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0&appId=750629119040166&autoLogAppEvents=1"
                        nonce="e26vHkB4"></script>

                    <div class="facebook_page mb-5" id="">
                        <h1 class="mb-3" style="color: var(--orange)">Our Facebook Page</h1>
                        <div class="fb-page" data-href="https://www.facebook.com/mindthegraph/"
                            data-tabs="timeline, events" data-width="500" data-height="" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/mindthegraph/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/mindthegraph/">Mind the Graph</a></blockquote>
                        </div>
                    </div>



                </aside>
            </div>



        </div>

    </section>



    <?php include_once("assets/includes/footer.php") ?>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
    </script>
</body>

</html>