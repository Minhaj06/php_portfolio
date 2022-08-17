<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("assets/includes/meta_links_scripts.php"); ?>
    <title>Coder || Blogs</title>
</head>

<body>
    <?php include_once("assets/includes/preloader.php") ?>
    <?php include_once("assets/includes/navbar.php") ?>

    <!-- blog section starts here -->
    <section class="all" id="blogs" style="margin-top: 12rem;">

        <div class="inner_blog container m-auto">

            <div class="row g-5">
                <main class="col-lg-8 mb-5 mb-lg-0">

                    <!-- Singel post view -->
                    <div class="single_post_view">
                        <img style="max-height: 50rem;" src="img/robot.jpg" width="100%" alt="post image">

                        <h2 style="font-weight: 300;" class="post_title my-4">I Used The Web For A Day On A
                            50 MB
                            Budget
                        </h2>

                        <a href="#">
                            <h4 style="background: var(--orange); color: var(--black)"
                                class="post_category d-inline-block p-3 fs-3 rounded mb-3">
                                International
                            </h4>
                        </a>

                        <p style="font-weight: 300" class="fs-5 mb-4">
                            <span class="post_date me-3"><i class="fa-solid fa-calendar-days"></i> 26th August,
                                2022</span>

                            <a href="#respond"><i class="fa-solid fa-comment"></i> Leave A Comment</a>
                        </p>

                        <div class="post_description mb-5 pb-4">
                            অজিদের কোচ গ্রাহাম আর্নল্ডের ভরসার প্রতিদানও দিয়েছেন ৩৩ বছর বয়সী পেনাল্টি বিশেষজ্ঞ গোলরক্ষক
                            অ্যান্ড্রু রেডমাইন। টানা তিন পেনাল্টি ঠেকিয়ে দেয়ার রেকর্ড আছে তার ঝুলিতে।

                            পেরুর বিপক্ষে প্লে অফে জিতে বিশ্বকাপে জায়গা করে নিয়েছে অস্ট্রেলিয়া। শেষ মুহূর্তে বদলি
                            গোলকিপার হিসেবে মাঠে নেমে অজিদের জয়ের নায়ক অ্যান্ড্রু রেডমাইন।

                            নির্ধারিত ৯০ মিনিট ও অতিরিক্ত ৩০ মিনিট পর্যন্ত গোল শূন্য থাকায় ম্যাচ গড়ায় টাইব্রেকারে।
                            ম্যাচের তিন মিনিট বাকি থাকতে মাঠে নামেন রেডমাইন। শ্বাসরুদ্ধকর টাইব্রেকারে ৫-৪ গোলে জয় পেয়ে
                            টানা পঞ্চম বারের মত বিশ্বকাপে জায়গা করে নেয় অস্ট্রেলিয়া।
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

                    </div>




                </main>


                <!-- Right aside section Starts here -->
                <aside class="col-lg-4">
                    <?php include_once("assets/includes/blog_aside.php") ?>
                </aside>
                <!-- Right aside section ends here -->



            </div>



        </div>

    </section>

    <?php include_once("assets/includes/footer.php") ?>
</body>

</html>