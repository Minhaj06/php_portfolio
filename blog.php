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
                <main class="col-lg-7 col-xl-8 mb-5 mb-lg-0">
                    <div class="row g-0 mb-5">
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

                    <div class="row g-4">
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


                <!-- Right aside section Starts here -->
                <aside class="col-lg-5 col-xl-4">

                    <?php include_once("assets/includes/blog_aside.php") ?>

                </aside>
                <!-- Right aside section ends here -->



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